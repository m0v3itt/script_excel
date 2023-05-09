<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
require_once ('./vendor/autoload.php');


if (isset($_POST["import"])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    //  mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0 ");
    //  mysqli_query($conn, "TRUNCATE TABLE `tb_dias`");
    // mysqli_query($conn, "TRUNCATE TABLE `tb_nadadores`");
    //  mysqli_query($conn, "TRUNCATE TABLE `tb_disponibilidade`");
    //  mysqli_query($conn, "TRUNCATE TABLE `tb_escala`");
    //  mysqli_query($conn, "TRUNCATE TABLE `tb_historico`");
    //  mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1 ");

    $flag = 0;
    if (in_array($_FILES["file"]["type"], $allowedFileType)) {
   
        if($flag == 0){
        $query = 'UPDATE tb_dias set estado=0';
		$result = mysqli_query($conn, $query);
        }	
        $flag=1;		

        $targetPath = 'uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $header = $spreadSheetAry[0];
        $header = array_filter($header); // all header values, includes "nome" e "peferencia"
        
        //compara os index ao longo das rows
        $days= array_slice($header, 2); // just header days values, dates (01/08/2022, 02/08/2022 ...)
        
        // insere os dias
        $ArrayDias = array();
        foreach($days as $day) {
            array_push($ArrayDias, $day);
            $query_check = "SELECT * FROM tb_dias WHERE dia = ?";
            $paramType_check = "s";
            $paramArray_check = array($day);
            $result = $db->select($query_check, $paramType_check, $paramArray_check);
            if(empty($result)) {
                $query_insert = "INSERT INTO tb_dias(dia,estado) VALUES (?, ?)";
                $paramType_insert = "si";
                $paramArray_insert = array($day, 1);
                $insertId = $db->insert($query_insert, $paramType_insert, $paramArray_insert);
            }
        }
        
        $ArrayDias = array_filter($ArrayDias);
        $primeiroDia = $ArrayDias[0];
        $ultimoDia = end($ArrayDias);
        $escala = "De_".$primeiroDia."_Até_".$ultimoDia;
        $query_check = "SELECT * FROM tb_historico WHERE escala = ?";
        $paramType_check = "s";
        $paramArray_check = array($escala);
        $result = $db->select($query_check, $paramType_check, $paramArray_check);

        if (empty($result)) {
            // the escala doesn't exist, insert it into tb_historico
            $query_insert = "INSERT INTO tb_historico (escala, data1, data2) VALUES (?, ?, ?)";
            $paramType_insert = "sss";
            $paramArray_insert = array(
                $escala,
                $primeiroDia,
                $ultimoDia
            );
            $insertId = $db->insert($query_insert, $paramType_insert, $paramArray_insert);
        } else{
            $query_check = "SELECT id_dia FROM tb_dias WHERE dia = ?";
            $paramType_check = "s";
            $paramArray_check = array($primeiroDia);
            $result = $db->select($query_check, $paramType_check, $paramArray_check);
            foreach($result as $row){
              
                $id_primeiroDia=$row['id_dia'];
            }
            $query_check = "SELECT id_dia FROM tb_dias WHERE dia = ?";
            $paramType_check = "s";
            $paramArray_check = array($ultimoDia);
            $result = $db->select($query_check, $paramType_check, $paramArray_check);
            foreach($result as $row){
             
                $id_ultimoDia=$row['id_dia'];
            }
            $query_update = "UPDATE tb_dias SET estado=1 WHERE id_dia between ?  AND ?";
            $paramType_update = "ii";
            $paramArray_update = array($id_primeiroDia, $id_ultimoDia);
            $result = $db->execute($query_update, $paramType_update, $paramArray_update);
        }

        $content = array_slice($spreadSheetAry, 1);

        // insere os os nadadores e os respetivos ids
        foreach($content as $row) {
            $nome = $row[0];
            $preference = $row[1];
            preg_match('/\(([A-Za-z0-9 ]+?)\)/', $nome, $out);
            $id_nadador=$out[1];
            $nadador=preg_replace("/\([^)]+\)/","",$nome);

            $query = "INSERT INTO tb_nadadores (id_nadador, nome, preferencia) VALUES (?, ?, ?) 
                    ON DUPLICATE KEY UPDATE preferencia = VALUES(preferencia)";

            $paramType = "iss";
            $paramArray = array(
            $id_nadador,
            $nadador,
            $preference
            );

            $insertId = $db->execute($query, $paramType, $paramArray);
            $turnos_from_row = array_slice($row, 2);
                
            for ($i = 0; $i <= count($days)-1; $i++) { // -1 because the row has always a final Null
                 $turno = $turnos_from_row[$i];
                 $sqlSelect = "SELECT id_dia FROM tb_dias where dia=?";
                 $id_do_dia = $db->select($sqlSelect,'s',[$days[$i]]);
                 
                if (strpos($turno, 'Manhã') !== false && strpos($turno, 'Tarde') !== false) {
                    $id_manha = 1;
                    $id_tarde = 1;
                } elseif (strpos($turno, 'Manhã') !== false) {
                    $id_manha = 1;
                    $id_tarde = 0;
                } elseif (strpos($turno, 'Tarde') !== false) {
                    $id_manha = 0;
                    $id_tarde = 1;
                } 
                else{
                    $id_manha=0;
                    $id_tarde=0;
                }
                 
                $query = "INSERT INTO tb_disponibilidade (Manhã, Tarde, id_nadador, id_dia)
                VALUES (?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE Manhã = VALUES(Manhã), Tarde = VALUES(Tarde)";
                
                $paramType = "iiii";
                $paramArray = array(
                    $id_manha,
                    $id_tarde,
                    $id_nadador,
                    $id_do_dia[0]['id_dia']
                );

                $insertId = $db->execute($query, $paramType, $paramArray);
        }
                
    }
    }
    else{
        echo'<h1> Erro </h1>';
        die();
    }

    echo '<script>alert("Ficheiro inserido com sucesso")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include("header.php");?>
    
    <title>Importar</title>
</head>
<body>
<?php include('nav.php');?>
<div id="content" class="p-4 p-md-5 pt-5">
    <div class="fullscreen table-cell valign-middle text-center">
        <h1 class="import-h1">IMPORTAR FICHEIRO</h1>
        <div class="importar container">
            <form action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="btn-importar-custom"   onchange="return fileValidation()" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                <button type="submit" id="submit" name="import" class="btn-submit btn-importar" >Importar</button>
                <button onclick="resetFile()" class="btn-importar">Limpar</button>
        </div>
  
    </form>
    </div>
</div>
    <script>
        function resetFile() {
            const file = document.querySelector('.file');
            file.value = '';
        }
    </script>
<script>
        function fileValidation() {
            var fileInput =
                document.getElementById('file');
             
            var filePath = fileInput.value;
         
            // Allowing file type
            var allowedExtensions =
                    /(\.xlsx)$/i;
             
            if (!allowedExtensions.exec(filePath)) {
                alert('Apenas ficheiros do tipo XSLX são aceites!');
                fileInput.value = '';
                return false;
            }    
           
        }
    </script>

   
<?php include('footer.php');?>
</body>

</html>
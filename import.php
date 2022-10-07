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
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0 ");
    mysqli_query($conn, "TRUNCATE TABLE `tb_dias`");
    mysqli_query($conn, "TRUNCATE TABLE `tb_nadadores`");
    mysqli_query($conn, "TRUNCATE TABLE `tb_disponibilidade`");
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1 ");
    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $header = $spreadSheetAry[0];
        //compara os index ao longo das rows
        $days= array_slice($header, 2);

        // insere os dias
        foreach($days as $day){
          
            $query = "insert into tb_dias(dia) values(?)";
            $paramType = "s";
            $paramArray = array(
                $day
            );
            $insertId = $db->insert($query, $paramType, $paramArray);
        }

        $content = array_slice($spreadSheetAry, 1);


        // insere os os nadadores e os respetivos ids
        foreach($content as $row) {
            
            $nome = $row[0];
            $preference = $row[1];
            preg_match('/\(([A-Za-z0-9 ]+?)\)/', $nome, $out);
            $codigo=$out[1];
            $nadador=preg_replace("/\([^)]+\)/","",$nome);
            $query = "insert into tb_nadadores(id_nadador,nome) values(?,?)";
            $paramType = "is";
            $paramArray = array(
                $codigo,
                $nadador

            );

            

            $insertId = $db->insert($query, $paramType, $paramArray);
        

            foreach (array_filter(array_slice($row, 2)) as $index=>$turno ){
                //descobrir o dia e de seguida o id do dia para inserir na tb_disponibilidade
                 $descobrir_dia=$days[$index];
                 $sqlSelect = "SELECT id_dia FROM tb_dias where dia=?";
                 $result = $db->select($sqlSelect,'s',[$descobrir_dia]);
                 
                 
                 
                 
                 //descobrir o turno do nadadador
                 if ($turno=='Manhã'){$id_manha='1';} else {$id_manha=0;}
                 if ($turno=='Tarde'){$id_tarde='1';} else {$id_tarde=0;}
                 if ($turno=='Manhã Tarde'){$id_manha=1; $id_tarde=1;}
                 //inserção dos campos na tb_disponibilidade
                 $codigo=$out[1];
                 foreach($result as $res){
                 $id_dia=$res['id_dia'];
                 }

                 $query = "insert into tb_disponibilidade(preferencias,Manhã,Tarde,id_nadador,id_dia) values(?,?,?,?,?)";
                 
                 $paramType = "siiii";
                 $paramArray = array(
                 $preference,
                 $id_manha,
                 $id_tarde,
                 $codigo,
                 $id_dia
                 );
                 $insertId=$db->insert($query,$paramType,$paramArray);
                

        }
                
    }
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="js/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="fullscreen table-cell valign-middle text-center">
        <h1 class="import-h1">IMPORTAR FICHEIRO</h1>
        <div class="importar container">
            <form action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="btn-importar-custom" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import" class="btn-submit btn-importar">Importar</button>
                <button onclick="resetFile()" class="btn-importar">Limpar</button>
        </div>
    
  
    </form>
    </div>
   
    <script>
        function resetFile() {
            const file = document.querySelector('.file');
            file.value = '';
        }
    </script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "ordering": false,
                language: {
                    lengthMenu: "Apresenta _MENU_ praias por página",
                    zeroRecords: "Não existem resultados",
                    info: "Página _PAGE_ de _PAGES_",
                    infoEmpty: "Não existem resultados",
                    infoFiltered: "(Filtrado de um total de _MAX_ praias)",
                    paginate: {
                        first: "Primeiro",
                        last: "Ultimo",
                        next: "Próximo",
                        previous: "Anterior"
                    }
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
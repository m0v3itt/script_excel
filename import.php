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
    <style>
    body {
        font-family: Arial;
        width: 550px;
    }

    .outer-container {
        background: #F0F0F0;
        border: #e0dfdf 1px solid;
        padding: 40px 20px;
        border-radius: 2px;
    }

    .btn-submit {
        background: #333;
        border: #1d1d1d 1px solid;
        border-radius: 2px;
        color: #f0f0f0;
        cursor: pointer;
        padding: 5px 20px;
        font-size: 0.9em;
    }

    .tutorial-table {
        margin-top: 40px;
        font-size: 0.8em;
        border-collapse: collapse;
        width: 100%;
    }

    .tutorial-table th {
        background: #f0f0f0;
        border-bottom: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }

    .tutorial-table td {
        background: #FFF;
        border-bottom: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }

    #response {
        padding: 10px;
        margin-top: 10px;
        border-radius: 2px;
        display: none;
    }

    .success {
        background: #c7efd9;
        border: #bbe2cd 1px solid;
    }

    .error {
        background: #fbcfcf;
        border: #f3c6c7 1px solid;
    }

    div#response.display-block {
        display: block;
    }
    </style>
</head>

<body>
    <h2>Import Excel File into MySQL Database using PHP</h2>

    <div class="outer-container">
        <form action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
                <label>Choose Excel File</label> <input type="file" name="file" id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
                <button onclick="resetFile()">Reset file</button>
            </div>

        </form>

    </div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <?php if(!empty($message)) { echo $message; } ?></div>


    <?php
$sqlSelect = "SELECT * FROM tb_dias";
$result = $db->select($sqlSelect);
if (! empty($result)) {
    ?>

    <table class='tutorial-table'>
        <thead>
            <tr>
                <th>Id_dia</th>
                <th>Dia</th>
            

            </tr>
        </thead>
        <?php
    foreach ($result as $row) { // ($row = mysqli_fetch_array($result))
        ?>
        <tbody>
            <tr>
                <td><?php  echo $row['id_dia']; ?></td>
                <td><?php  echo $row['dia']; ?></td>

            </tr>
            <?php
    }
    ?>
        </tbody>
    </table>
    <?php
}
?>
<?php
$sqlSelect = "SELECT * FROM tb_nadadores";
$result = $db->select($sqlSelect);
if (! empty($result)) {
    ?>

    <table class='tutorial-table'>
        <thead>
            <tr>
                <th>Id_nadador</th>
                <th>Nome</th>
            

            </tr>
        </thead>
        <?php
    foreach ($result as $row) { // ($row = mysqli_fetch_array($result))
        ?>
        <tbody>
            <tr>
                <td><?php  echo $row['id_nadador']; ?></td>
                <td><?php  echo $row['nome']; ?></td>

            </tr>
            <?php
    }
    ?>
        </tbody>
    </table>
    <?php
}
?>
<?php
$sqlSelect = "SELECT * FROM tb_disponibilidade";
$result = $db->select($sqlSelect);
if (! empty($result)) {
    ?>

    <table class='tutorial-table'>
        <thead>
            <tr>
                <th>Id_nadador</th>
                <th>Manha</th>
                <th>Tarde</th>
                <th>id_dia</th>
                <th>Preferências</th>
            

            </tr>
        </thead>
        <?php
    foreach ($result as $row) { // ($row = mysqli_fetch_array($result))
        ?>
        <tbody>
            <tr>
                <td><?php  echo $row['id_nadador']; ?></td>
                <td><?php  echo $row['Manhã']; ?></td>
                <td><?php  echo $row['Tarde']; ?></td>
                <td><?php  echo $row['id_dia']; ?></td>
                <td><?php  echo $row['preferencias']; ?></td>

            </tr>
            <?php
    }
    ?>
        </tbody>
    </table>
    <?php
}
?>
    <script>
    function resetFile() {
        const file = document.querySelector('.file');
        file.value = '';
    }
    </script>
</body>

</html>
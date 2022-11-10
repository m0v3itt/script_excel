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
    mysqli_query($conn, "TRUNCATE TABLE `tb_praia`");
 
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
        $content = array_slice($spreadSheetAry, 1);


        // insere os os nadadores e os respetivos ids
        foreach($content as $row) {
            $praia = $row[0];
            $turno = $row[1];
            $query = "insert into tb_praia(nome_praia,turno) values(?,?)";
            $paramType = "ss";
            $paramArray = array(
                $praia,
                $turno

            );

            

            $insertId = $db->insert($query, $paramType, $paramArray);

                
    }
    }
}
?>
<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="assets/js/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="fullscreen table-cell valign-middle text-center">
        <h1 class="import-h1">IMPORTAR PRAIA</h1>
        <div class="importar container">
            <form action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="btn-importar-custom" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import" class="btn-submit btn-importar">Importar</button>
                <button onclick="resetFile()" class="btn-importar">Limpar</button>
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
    <script>
    function resetFile() {
        const file = document.querySelector('.file');
        file.value = '';
    }
    </script>
</body>

</html>

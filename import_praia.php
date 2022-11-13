<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
require_once ('./vendor/autoload.php');
include("header.php");

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

    <script>
    function resetFile() {
        const file = document.querySelector('.file');
        file.value = '';
    }
    </script>
</body>

</html>

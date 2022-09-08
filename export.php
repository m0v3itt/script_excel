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

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 2; $i <= $sheetCount; $i ++) {
            $dias = "";
            if (isset($spreadSheetAry[0][$i])) {
                $dias = mysqli_real_escape_string($conn, $spreadSheetAry[0][$i]);
            }
        
            

            if (! empty($dias)) {
                $query = "insert into tb_dias(dia) values(?)";
                $paramType = "s";
                $paramArray = array(
                    $dias
                );
                $insertId = $db->insert($query, $paramType, $paramArray);
                if (! empty($insertId)) {
                    $type = "success";
                    $message = "Excel Data Imported into the Database";
                } else {
                    $type = "error";
                    $message = "Problem in Importing Excel Data!!!!!!!!!";
                }
            }
        }
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }

    for ($i = 1; $i <= $sheetCount; $i ++) {
        $name = "";
        if (isset($spreadSheetAry[$i][0])) {
            $name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            preg_match('/\(([A-Za-z0-9 ]+?)\)/', $name, $out);
            $codigo=$out[1];
     
        }
        $preferencias = "";
        if (isset($spreadSheetAry[$i][1])) {
            $preferencias = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
        }
        

        if (! empty($name) || ! empty($preferencias)) {
            $query = "insert into tb_nadadores(nome,preferencias,id_nadador) values(?,?,?)";
            $paramType = "ssi";
            $paramArray = array(
                $name,
                $preferencias,
                $codigo
            );
            $insertId = $db->insert($query, $paramType, $paramArray);
            if (! empty($insertId)) {
                $type = "success";
                $message = "Excel Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing Excel Data.............";
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
        <form action="" method="post" name="range" enctype="multipart/form-data">
            <div>
            <?php
     $sqlSelect = "SELECT * FROM tb_dias";
     $resultad = $db->select($sqlSelect);
     echo"<select name='Dias' size='1' class='form-select form-select-sm'>";
     echo"<option value='' disabled selected hidden> Dias </option>"; 
                            foreach($resultad as $re){
                                $dia1=$re['dia']; 
                                $id1=$re['id_dia'];
                                echo"<option value=$id1>$dia1</option>";     
                                } 
                                echo "</select>"; 
                                echo"<select name='Dias' size='1' class='form-select form-select-sm'>";
     echo"<option value='' disabled selected hidden> Dias </option>"; 
                            foreach($resultad as $re){
                                $dia2=$re['dia']; 
                                $id2=$re['id_dia'];
                                echo"<option value=$id2>$dia2</option>";     
                                } 
                                echo "</select>";

                                echo "<input type='submit'>"

?>
                
            </div>

        </form>

    </div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <?php if(!empty($message)) { echo $message; } ?></div>

    <table class='tutorial-table'>
        <thead>
            <tr>
           
                <th>Nome_praia</th>
                <th>Turno_praia</th>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $sqlSelect = "SELECT * FROM tb_dias where dia between $id1 and $id2";
                    $result = $db->select($sqlSelect);
                    var_dump($result);
                    
                    if (! empty($result)) {
                        foreach ($result as $row) { 
                            echo "<th>".$row['dia']."</th>";
                        }}
                    ?>
            

            </tr>
        </thead>
        <?php
        $sqlSelect = "SELECT * FROM tb_praia";
        $resultado = $db->select($sqlSelect);
        
    foreach ($resultado as $res) { // ($row = mysqli_fetch_array($result))
        ?>
        <tbody>
            <tr><?php 
          
           
                 echo '<td>' .$res['nome_praia']. '</td>';
                 echo '<td>'  .$res['turno']. '</td>';

                ?>

            </tr>
            <?php
    }
    ?>
        </tbody>
    </table>
    <?php
     $sqlSelect = "SELECT dia FROM tb_dias";
     $resultad = $db->select($sqlSelect);
     echo"<select name='Dias' size='1' class='form-select form-select-sm'>";
     echo"<option value='' disabled selected hidden> Dias </option>"; 
                            foreach($resultad as $re){
                                $dias=$re['dia']; 
                                echo"<option value='$dias'>$dias</option>";     
                                } 
                                echo "</select>";  
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


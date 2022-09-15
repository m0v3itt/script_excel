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

    <table class='tutorial-table'>
        <thead>
            <tr>
                <?php
                    
                $sqlSelect = " SELECT * from tb_dias";

                    $result = $db->select($sqlSelect);
                    
                    if (! empty($result)) {
                        foreach ($result as $row) { 
                            echo "<th>".$row['dia']."</th>";
                           
                        }
                    ?>
            

            </tr>
        </thead>
        <?php
        $sqlSelect ="SELECT tb_disponibilidade.id_nadador,
        tb_dias.id_dia,
        tb_nadadores.nome,
        tb_dias.dia,
        tb_praia.nome_praia,
        tb_praia.turno 
        FROM ((tb_praia,tb_disponibilidade
        INNER JOIN tb_dias ON tb_disponibilidade.id_dia = tb_dias.id_dia) 
        INNER JOIN tb_nadadores ON tb_disponibilidade.id_nadador = tb_nadadores.id_nadador) 
        where tb_praia.turno='Manhã' and tb_disponibilidade.Manhã=1 
        or tb_praia.turno='Tarde' and tb_disponibilidade.Tarde=1;";

        
        
            
            $resultado = $db->select($sqlSelect);
            
            
            foreach ($resultado as $res) {
                
                $id_nadador=$res['id_nadador'];
                $id=$res['id_dia'];
                var_dump($id);
                
            }
            foreach($id==$row['id_dia'] as $index){
                echo '<td>' .$id_nadador. '</td>';
            }

    }
      /*"SELECT tb_disponibilidade.id_nadador,
      tb_dias.id_dia,
      tb_nadadores.nome,
      tb_dias.dia,
      tb_praia.nome_praia,
      tb_praia.turno 
      FROM ((tb_praia,tb_disponibilidade
      INNER JOIN tb_dias ON tb_disponibilidade.id_dia = tb_dias.id_dia) 
      INNER JOIN tb_nadadores ON tb_disponibilidade.id_nadador = tb_nadadores.id_nadador) 
      where tb_praia.turno='Manhã' and tb_disponibilidade.Manhã=1 
      or tb_praia.turno='Tarde' and tb_disponibilidade.Tarde=1;";*/
        
    // foreach ($resultado as $res) {
    //     var_dump($res['id_nadador']);
    //     var_dump($res['id_dia']) ; 
    //     // ($row = mysqli_fetch_array($result))
        ?>
        <tbody>
            <tr><?php 
          
           
                 echo '<td>' .$res['id_nadador']. '</td>';
                
                ?>

            </tr>
            <?php
    // }
    ?>
        </tbody>
    </table>
    <?php

?>
    <script>
    function resetFile() {
        const file = document.querySelector('.file');
        file.value = '';
    }
    </script>
</body>

</html>


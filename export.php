<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

// ligação à DB

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
require_once ('./vendor/autoload.php');
$um=$_POST['dia1'];
$dois=$_POST['dia2'];

// Selecionar os dias que vão aparecer na tabela


if (isset($_POST["enviar"])) {
    $sqlSelect = "SELECT * FROM tb_dias where id_dia between $um and $dois";
    $result = $db->select($sqlSelect);
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="range">
       <label> Insira as datas </label>
       <?php
       // escolher os dias que vão aparecer na tabela
       $sqlSelect = "SELECT * FROM tb_dias";
       $resultad = $db->select($sqlSelect);
       echo"<select name='dia1' size='1' class='form-select form-select-sm'>";
       echo"<option value='' disabled selected hidden> Dias </option>"; 
                              foreach($resultad as $re){
                                  $dia1=$re['dia']; 
                                  $id1=$re['id_dia'];
                                  echo"<option value=$id1>$dia1</option>";     
                                  } 
      ?> 
        </select>

        <?php
       $sqlSelect = "SELECT * FROM tb_dias";
       $resultad = $db->select($sqlSelect);
       echo"<select name='dia2' size='1' class='form-select form-select-sm'>";
       echo"<option value='' disabled selected hidden> Dias </option>"; 
                              foreach($resultad as $re){
                                  $dia2=$re['dia']; 
                                  $id2=$re['id_dia'];
                                  echo"<option value=$id2>$dia2</option>";     
                                  } 
      ?> 
        </select>
         <input type="submit" name="enviar">                         
    </form>

        <br>
        <table style="display: inline-block; border: 1px solid; float: left; ">
        <thead>
            <tr>
           
                <th>Nome_praia</th>
                <th>Turno_praia</th>
                <?php
                    //gerar a tabela 
                    if (! empty($result)) {
                        foreach ($result as $row) { 
                            echo "<th>".$row['dia']."</th>";
                            $id_dia=$row['id_dia'];
                        }}
                        
                    ?>
            </tr>
        </thead>
        <?php
        $sqlSelect = "SELECT * FROM tb_praia";
        $resultado = $db->select($sqlSelect);
        
    foreach ($resultado as $res) {
        ?>
        <tbody>
            <tr><?php 
                 echo '<td>' .$res['nome_praia']. '</td>';
                 echo '<td>'  .$res['turno']. '</td>';
                 foreach ($result as $row) {
                    echo '<td>'.''.'</td>';
                }
            
                ?>
               
            </tr>


            <?php
}

    ?>
        </tbody>
        <table style="display: inline-block; border: 1px solid; float: left; ">
<tr>

    <th>Id</th>
    <th>Id_dia</th>
    <th>Dia</th>
    <th>Manhã</th>
    <th>Tarde</th>

</tr>
<tr>
    <?php
           
            $sqlSelect = " SELECT tb_dias.id_dia, tb_dias.dia, tb_disponibilidade.id_nadador, tb_disponibilidade.Manhã,tb_disponibilidade.Tarde 
            FROM (tb_dias 
            INNER JOIN tb_disponibilidade on tb_dias.id_dia=tb_disponibilidade.id_dia) 
            where tb_dias.id_dia between $um and $dois order by tb_disponibilidade.id_nadador ASC";
            $result = $db->select($sqlSelect);
            foreach($result as $r){
                echo '<td>'. $r['id_nadador'].'</td>';
                echo '<td>'. $r['id_dia'].'</td>';
                echo '<td>'. $r['dia'].'</td>';
                echo '<td>'. $r['Manhã'].'</td>';
                echo '<td>'. $r['Tarde'].'</td>';

           
            
    ?>
</tr>
<?php  } ?>
</table>
</body>
</html>























<!-- <!DOCTYPE html>
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
            </*?php
     $sqlSelect = "SELECT * FROM tb_dias";
     $resultad = $db->select($sqlSelect);
     echo"<select name='dia1' size='1' class='form-select form-select-sm'>";
     echo"<option value='' disabled selected hidden> Dias </option>"; 
                            foreach($resultad as $re){
                                $dia1=$re['dia']; 
                                $id1=$re['id_dia'];
                                echo"<option value=$id1>$dia1</option>";     
                                } 
                                echo "</select>"; 
                                echo"<select name='dia2' size='1' class='form-select form-select-sm'>";
     echo"<option value='' disabled selected hidden> Dias </option>"; 
                            foreach($resultad as $re){
                                $dia2=$re['dia']; 
                                $id2=$re['id_dia'];
                                echo"<option value=$id2>$dia2</option>";     
                                } 
                                echo "</select>";

                                echo "<input type='submit' name='enviar'>"
*/
?>
                
            </div>

        </form>

    </div>
    <div id="response" class="<*?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <*?/php if(!empty($message)) { echo $message; } ?></div>

    <table class='tutorial-table'>
        <thead>
            <tr>
           
                <th>Nome_praia</th>
                <th>Turno_praia</th>
                <*?php
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
        <*?php
        $sqlSelect = "SELECT * FROM tb_praia";
        $resultado = $db->select($sqlSelect);
        
    foreach ($resultado as $res) { // ($row = mysqli_fetch_array($result))
        ?>
        <tbody>
            <tr><*?php 
          
           
                 echo '<td>' .$res['nome_praia']. '</td>';
                 echo '<td>'  .$res['turno']. '</td>';

                ?>

            </tr>
            <*?php
    }
    ?>
        </tbody>
    </table>
    <*?php
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
  
</body>

</html>
 -->

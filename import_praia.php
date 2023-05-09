<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
require_once ('./vendor/autoload.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("header.php");?>
    <title>Inserir praia</title>
</head>
<body>
    
</body>
</html>
<body>
<?php include("nav.php");?>
<div id="content" class="p-4 p-md-5 pt-5">
    <div class="fullscreen table-cell valign-middle text-center">
        <h1 class="import-h1">Inserir praia</h1>
        <div class="importar container">
            <form action="" method="post">
                <label>Nome da praia:</label>
                <input type="text" name="nome_praia">
                <button type="submit" name="submit">Enviar</button>
            </form>
        </div>
    
    </div>
</div>
<?php include("footer.php");?>
<?php 

if (isset($_POST["submit"])) {
    if (!empty($_POST["nome_praia"])){
    $nome_praia = $_POST['nome_praia'];
    for($i=0;$i<2;$i++){
        if($i%2==0){
            $query = "insert into tb_praia(nome_praia,turno,nr_nadadores) values(?,?,?)";
            $paramType = "ssi";
            $paramArray = array(
                $nome_praia,
                'Manhã',
                2
            );
            $insertId = $db->insert($query, $paramType, $paramArray);
        }
        else{
            $query = "insert into tb_praia(nome_praia,turno,nr_nadadores) values(?,?,?)";
            $paramType = "ssi";
            $paramArray = array(
                $nome_praia,
                'Tarde',
                2
            );
            $insertId = $db->insert($query, $paramType, $paramArray);
        }
    }
    
    
    
        echo '<script>alert("Praia inserida com sucesso");</script>';
    }
    else{
        echo '<script>alert("Não pode inserir uma praia em branco");</script>';
    }
        
  
}

?>
</body>

</html>

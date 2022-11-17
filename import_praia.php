<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
require_once ('./vendor/autoload.php');
include("header.php");

if (isset($_POST["submit"])) {
    $nome_praia = $_POST['nome_praia'];
    for($i=0;$i<2;$i++){
        if($i%2==0){
            $query = "insert into tb_praia(nome_praia,turno) values(?,?)";
            $paramType = "ss";
            $paramArray = array(
                $nome_praia,
                'Manhã',
            );
            $insertId = $db->insert($query, $paramType, $paramArray);
        }
        else{
            $query = "insert into tb_praia(nome_praia,turno) values(?,?)";
            $paramType = "ss";
            $paramArray = array(
                $nome_praia,
                'Tarde',
            );
            $insertId = $db->insert($query, $paramType, $paramArray);
        }
    }
    
    
    
}
?>

<body>
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

</body>

</html>

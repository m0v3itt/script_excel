<?php 
use Phppot\DataSource;


require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

$dia = $_POST['dia'];
$id = $_POST['id'];
$praia = $_POST['praia'];
$turno = $_POST['turno'];
<<<<<<< HEAD


=======
$codigo = $_POST['codigo'];
>>>>>>> f3b9eac9e21985634a094c040ac0264dd6d9c2df


    $query = "insert into tb_escala(id_nadador,id_praia,id_dia,turno,codigo) values(?,?,?,?,?)";
    $paramType = "iiiss";
    $paramArray = array(
        $id,
        $praia,
        $dia,
        $turno,
<<<<<<< HEAD
   
=======
        $codigo
>>>>>>> f3b9eac9e21985634a094c040ac0264dd6d9c2df
    );
    $insertId = $db->insert($query, $paramType, $paramArray);


?>
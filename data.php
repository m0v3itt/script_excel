<?php 
use Phppot\DataSource;


require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

$dia = $_POST['dia'];
$id = $_POST['id'];
$praia = $_POST['praia'];
$turno = $_POST['turno'];




    $query = "insert into tb_escala(id_nadador,id_praia,id_dia,turno) values(?,?,?,?)";
    $paramType = "iiis";
    $paramArray = array(
        $id,
        $praia,
        $dia,
        $turno,
   
    );
    $insertId = $db->insert($query, $paramType, $paramArray);


?>
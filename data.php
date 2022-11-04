<?php 
use Phppot\DataSource;


require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

$dia = $_POST['dia'];
$id = $_POST['id'];
$praia = $_POST['praia'];
$turno = $_POST['turno'];
$codigo = $_POST['codigo'];

    $query = "insert into tb_escala(id_nadador,id_praia,id_dia,turno,codigo) values(?,?,?,?,?)";
    $paramType = "iiiss";
    $paramArray = array(
        $id,
        $praia,
        $dia,
        $turno,
        $codigo
    );
    $insertId = $db->insert($query, $paramType, $paramArray);


?>
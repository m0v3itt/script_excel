<?php
use Phppot\DataSource;
include_once ("db_connect.php");
include_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
if ($_SESSION['admin'] == 0) {
	echo "Não tens permissões para aceder a esta página";
	die;
	session_destroy();
}
$id_nadador = $_GET['id'];
$data1 = $_GET['data1'];
$data2 = $_GET['data2'];
$turno = $_GET['turno'];
$query = "SELECT tb_dias.dia FROM tb_disponibilidade 
INNER JOIN tb_dias on tb_dias.id_dia=tb_disponibilidade.id_dia
WHERE id_nadador = $id_nadador
AND tb_disponibilidade.id_dia BETWEEN $data1 AND $data2 AND $turno = 1";

$result = $db->select($query);
$resultados=[];
$i=0;
if ($db->getRecordCount($query)>1){
    
    foreach ($result as $row){
        $resultados[$i++] = ['dias' => $row['dia']];
    }
    echo json_encode ($resultados);
}
else {
    echo json_encode (false);
}




?>

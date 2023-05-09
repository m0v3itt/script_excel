<?php
use Phppot\DataSource;

include_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

$id_nadador = $_GET['id'];
$data1 = $_GET['data1'];
$data2 = $_GET['data2'];
$turno = $_GET['turno'];

// $query = "SELECT id_dia FROM tb_escala
// WHERE id_nadador = $id_nadador AND id_dia BETWEEN $data1 AND $data2 AND turno='$turno'";
$query = "SELECT tb_dias.dia FROM tb_escala
INNER JOIN tb_dias on tb_dias.id_dia=tb_escala.id_dia
WHERE id_nadador = $id_nadador AND tb_escala.id_dia BETWEEN $data1 AND $data2 AND  turno='$turno'";

$result = $db->select($query);
$resultados=[];
$i=0;
if ($db->getRecordCount($query)>0){
    
    foreach ($result as $row){
        // $dias = $row['id_dia'];
        // array_push($resultados,$dias);
        $dias = date("d/m/Y", strtotime($row['dia']));
        array_push($resultados,$dias);

    }

    echo json_encode ($resultados);
}
else {
    var_dump($result);
    echo json_encode (false);
}




?>


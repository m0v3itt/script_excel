<?php
header('Content-Type: application/json; charset=utf-8');

include_once('db_connect.php');



$turno = ($_GET['praia'] % 2 == 0) ? 'Tarde' : 'Manhã';

$query = "SELECT tb_nadadores.id_nadador, tb_nadadores.nome from tb_nadadores
inner JOIN tb_disponibilidade on tb_nadadores.id_nadador =  tb_disponibilidade.id_nadador 
where tb_disponibilidade.id_dia = {$_GET['dia']} AND tb_disponibilidade.{$turno} = 1 AND 
 tb_nadadores.id_nadador not in (select tb_escala.id_nadador from tb_escala where tb_escala.id_dia = {$_GET['dia']} and tb_escala.turno = '{$_GET['turno']}'  )
order by tb_nadadores.id_nadador ASC;";

$resultsett = mysqli_query($conn, $query);

$results = [];
$i = 0;
while ($row = mysqli_fetch_assoc($resultsett))
    {
	    $results[$i++] = ['id' => $row['id_nadador'], 'text' => $row['nome']];
	}

echo json_encode($results);

?>

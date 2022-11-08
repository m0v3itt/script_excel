<?php 
include_once('db_connect.php');

$dia = $_POST['dia'];
$id = $_POST['id'];
$praia = $_POST['praia'];
$turno = $_POST['turno'];
// $codigo = $_POST['codigo'];
$sql = "DELETE FROM tb_escala WHERE id_nadador=$id  and id_dia=$dia and  id_praia=$praia and turno='$turno'  ";

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);



?>
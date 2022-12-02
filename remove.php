<?php 
include_once('db_connect.php');

$dia = $_POST['dia'];
$id = $_POST['id'];
$praia = $_POST['praia'];
$turno = $_POST['turno'];
<<<<<<< HEAD

// $codigo = $_POST['codigo'];
$sql = "DELETE FROM tb_escala WHERE id_nadador=$id  and id_dia=$dia and  id_praia=$praia and turno='$turno'   ";
=======
$codigo = $_POST['codigo'];
// $codigo = $_POST['codigo'];
$sql = "DELETE FROM tb_escala WHERE id_nadador=$id  and id_dia=$dia and  id_praia=$praia and turno='$turno' and codigo='$codigo'  ";
>>>>>>> f3b9eac9e21985634a094c040ac0264dd6d9c2df

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);



?>
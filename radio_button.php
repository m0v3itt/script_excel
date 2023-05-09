<?php 
include_once('db_connect.php');
$nr_nadadores = $_POST['nr'];
$id_praia = $_POST['id_praia'];
    if(isset($nr_nadadores)){
    $query = "UPDATE tb_praia set nr_nadadores =  $nr_nadadores where id_praia = $id_praia";
    $result = mysqli_query($conn, $query);
}
?>

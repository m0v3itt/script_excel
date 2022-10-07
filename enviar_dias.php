<?php
include_once ("db_connect.php");

// Selecionar os dias que vão aparecer na tabela
if (isset($_POST["enviar"]))
{
    $um = $_POST['dia1'];
    $dois = $_POST['dia2'];
    $sql_query = "SELECT * from tb_dias where id_dia between $um and $dois";
    $resultsett = mysqli_query($conn, $sql_query) or die("database error:" . mysqli_error($conn));

}
?>
		
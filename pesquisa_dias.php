<?php
include_once ("db_connect.php");

?>
<?php

// Selecionar os dias que vão aparecer na tabela
    if (isset($_POST["submeter"]))
    {
        $um = $_POST['dia1'];
        $dois = $_POST['dia2'];
        $sql_query = "SELECT * from tb_dias where id_dia between $um and $dois";
        $resultsett = mysqli_query($conn, $sql_query);

    }
    ?>
   
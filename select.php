<?php
   include_once ("db_connect.php");
    if(isset($_POST['enviar'])){
        $ids = $_POST['nadadores'];
        $id_praia = $_POST['id_praia'];
        $nome_praia = $_POST['nome_praia'];
        $turno = $_POST['dias'];

 
        $nadadores= implode(",",$ids);

        echo "O nadadaor com id : " .$nadadores. " vai trabalhar na praia: " .$id_praia. " no turno " .$turno;
       
    }















?>
<?php
   include_once ("db_connect.php");
    if(isset($_POST['enviar'])){
        // $nadadores_nomes = $_POST['nadadores'];
        // $id_praia = $_POST['id_praia'];
        // $nome_praia = $_POST['nome_praia'];
        // $turno = $_POST['turno'];
        // $dias = $_POST['dias'];
        // $dia = implode(",",$dias);
        // $nadadores= implode(",",$nadadores_nomes);
        // for ($i = 0; $i<=$dia; $i++){
        //     for($j=1;$j<=2;$i++){
        //         echo "Os nadadores com ids : " .$nadadores[$j]. " vao trabalhar na praia: " .$id_praia. " no turno " .$turno. " no dia" .$dia[$i];
        //     }
        // }
        $salvadores = $_POST['nadadores'];
        $praias = $_POST['nome_praia'];
        $turninho = $_POST['turno'];
        $ids = $_POST['id_praia'];
        $dias = $_POST['dias'];
        
        var_dump($dias);
        $praiasLenght = count($_POST['id_praia']);
        echo $praiasLenght;
        
        for ($i=0;$i<$praiasLenght;$i++){
            echo "O nadador " .$salvadores[$i]. " vai trabalhar na praia " .$ids[$i]. " no turno " .$turninho[$i];
            echo "<br>";
       }
    }
?>
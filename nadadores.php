<?php
    include 'db_connect.php';
    $nadadores = "SELECT * from tb_nadadores";
    $resultado = mysqli_query($conn,$nadadores);
    if (mysqli_num_rows($resultado) > 0){
        while($row = mysqli_fetch_assoc($resultado)>0){
            $nadador = $row['nadador'];

        }
    }
    else {
        echo 'Erro';
    }
?>
<?php
   include_once ("db_connect.php");
    if(isset($_POST['save_multiple'])){
        $ids = $_POST['nadadores'];
        foreach($ids as $id){
            echo $id;
        }
    }















?>
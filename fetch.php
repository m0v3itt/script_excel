<?php
include_once("db_connect.php");
 
if (isset($_POST["type"])) {
    if ($_POST["type"] == "nome") {
        $sqlQuery = "SELECT * FROM tb_nadadores ORDER BY id_nadador ASC";
        $resultset = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
        while( $row = mysqli_fetch_array($resultset) ) {
            $output[] = [
                'id' => $row["id_nadador"],
                'name' => $row["nome"],
            ];
        }
        echo json_encode($output); 
    }
}
  
?>

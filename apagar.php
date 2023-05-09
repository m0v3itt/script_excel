<?php
use Phppot\DataSource;
include_once ("db_connect.php");
include ("header.php");
require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
if ($_SESSION['admin'] == 0) {
	echo "Não tens permissões para aceder a esta página";
	die;
	session_destroy();
}

    if (isset($_GET['data1']) && isset($_GET['data2'])){
       
        $sql = "DELETE FROM tb_historico WHERE data1='$_GET[data1]' and data2='$_GET[data2]'   ";
        mysqli_query($conn, $sql);
      
   
        $query = "SELECT * FROM tb_dias where dia = '$_GET[data1]'";
        $result = $db->select($query);
        foreach($result as $row){
            $diaUm = $row['id_dia'];
        }
        $query = "SELECT * FROM tb_dias where dia = '$_GET[data2]'";
        $result = $db->select($query);
        foreach($result as $row){
            $diaDois = $row['id_dia'];
        }
        mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0 ");
     
       
    $sql = "DELETE FROM tb_escala WHERE id_dia between $diaUm and $diaDois   ";
    mysqli_query($conn, $sql);

    $sql = "DELETE FROM tb_dias WHERE id_dia between $diaUm and $diaDois   "; 
    mysqli_query($conn, $sql);

    $sql = "DELETE FROM tb_disponibilidade WHERE id_dia between $diaUm and $diaDois   "; 
    mysqli_query($conn, $sql);
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1 ");
    header("location: historico.php");

    }

   
   
    
?>
<?php
use Phppot\DataSource;
include ("header.php");
require_once 'DataSource.php';
$db = new DataSource();


$username = $_POST['username'];
		$password = $_POST['password'];

		$query = 'SELECT id,senha,admin from tb_login where user=?';
		$paramType = 's';
		$paramValue = array($username);
		$result = $db->select($query,$paramType,$paramValue);
		foreach($result as $res){
			echo $res['nome_praia'];
		}

?>
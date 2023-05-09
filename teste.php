<?php
use Phppot\DataSource;
include ("header.php");
require_once 'DataSource.php';
$db = new DataSource();

$dias = $_POST['resultString'];
echo $dias;
?>
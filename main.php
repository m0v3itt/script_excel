<?php
use Phppot\DataSource;
require_once 'db_connect.php';
require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
if ($_SESSION['admin'] == 0) {
	echo "Não tens permissões para aceder a esta página";
	die;
	session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("header.php");?>
    <title>Home</title> 
</head>
<body>
    <?php include("nav.php");?>
    <div id="content" class="p-4 p-md-5 pt-5">
    <div class="fullscreen table-cell valign-middle text-center">
        <h1 class="import-h1">Gestão de escalas</h1>
    </form>
    </div>
</div>
    <?php include("footer.php");?>
</body>
</html>
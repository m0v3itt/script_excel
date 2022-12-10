<?php
use Phppot\DataSource;
include ("header.php");
require_once 'DataSource.php';
$db = new DataSource();
	$msg = "";

	if (isset($_POST['submit'])) {


		$username = $_POST['username'];
		$password = $_POST['password'];
		$cPassword = $_POST['cPassword'];

		if ($password != $cPassword)
			$msg = "As passwords não coincidem";
		else {
			$hash = password_hash($password, PASSWORD_BCRYPT);
			$query = 'insert into tb_login(user,senha,admin) values(?,?,?)';
            $paramType = "ssi";
            $paramArray = array(
                $username,
				$hash,
				0
            );
            $insertId = $db->insert($query, $paramType, $paramArray);

			$msg = "Registo completo!";
		}
	}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				<img src="assets/images/summer.png"><br><br>

				<?php if ($msg != "") echo $msg . "<br><br>"; ?>

				<form method="post" action="register.php">
					<input class="form-control" name="username" type="username" placeholder="Username..."><br>
					<input class="form-control" minlength="5" name="password" type="password" placeholder="Password..."><br>
					<input class="form-control" minlength="5" name="cPassword" type="password" placeholder="Confirm Password..."><br>
					<input class="btn btn-primary" name="submit" type="submit" value="Register..."><br>
				</form>

			</div>
		</div>
	</div>
</body>
</html>
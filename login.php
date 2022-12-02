<<<<<<< HEAD
<?php
include_once("db_connect.php");
	$msg = "";

	if (isset($_POST['submit'])) {

		$username = $conn->real_escape_string($_POST['username']);
		$password = $conn->real_escape_string($_POST['password']);

		$sql = $conn->query("SELECT id, senha, admin FROM tb_login WHERE user='$username'");
		if ($sql->num_rows > 0) {
		    $data = $sql->fetch_array();
		    if (password_verify($password, $data['senha'])) {
				$admin = $data['admin'];
		        $msg = "Login completo!";
				
				if ($admin == 1 ){
					$_SESSION['admin'] = $admin;
					echo "Entrou corretamente";
					header("location: index.php");
				}
				else{
					echo "Não é admin";
					$_SESSION['admin'] = $admin;
				}
            } else
			    $msg = "Os dados estão errados!";
        } else
            $msg = "Os dados estão errados!";
	}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Password Hashing - Log In</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				<img src="assets/images/summer.png"><br><br>

				<?php if ($msg != "") echo $msg . "<br><br>"; ?>

				<form method="post" action="login.php">
					<input class="form-control" name="username" type="text" placeholder="Username..."><br>
					<input class="form-control" minlength="5" name="password" type="password" placeholder="Password..."><br>
					<input class="btn btn-primary" name="submit" type="submit" value="Log In"><br>
				</form>

			</div>
		</div>
	</div>
</body>
</html>
=======
<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Gestão de escalas</title>
</head>
<body>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="auth.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>
</body>
</html>

>>>>>>> f3b9eac9e21985634a094c040ac0264dd6d9c2df

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
					header("location: main.php");
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
    <title>Log In</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				<img src="assets/images/summer.png"><br><br>

				<?php if ($msg != "") echo $msg . "<br><br>"; ?>

				<form method="post" action="index.php">
					<input class="form-control" name="username" type="text" placeholder="Username..."><br>
					<input class="form-control" minlength="5" name="password" type="password" placeholder="Password..."><br>
					<input class="btn btn-primary" name="submit" type="submit" value="Log In"><br>
				</form>

			</div>
		</div>
	</div>
</body>
</html>

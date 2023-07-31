<?php 
	session_start();
	require('Database.php');
	$db = new Database('localhost','root','','burgercode');
		if (isset($_POST['connexion'] )) 
		{
			if (!empty($_POST['login']) && !empty($_POST['password'])) 
			{
				$user = [
				'username'=> $_POST['username'],
				'password'=> $_POST['password']
						];
			}
			else
			{
				echo "Veuillez remplir les champs";
			}
			
		}
		
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Burger Code</title>
	<link rel="icon"  href="images/b6.png">

	<script type="text/javascript" href="js/jquery-2.2.3.js"></script>
	<script type="text/javascript" href="js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/burgercode.css">
	<link rel="stylesheet" type="text/css" href="fa/css/font-awesome.min.css">
	<link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
	
	<div class="container">
		
		<h1 class="text-logo"><span class="fa fa-cutlery" id="iconeTitle"></span> BURGER CODE <span class="fa fa-cutlery"id="iconeTitle"></span></h1>
	</div>
	<div class="container" style="width:500px; background: white; border-radius: 5px; padding: 30px;" >
		<form role="form" method="POST" action="menu.php">
			<div class="form-group">
				<label>Nom d'utilisateur</label>
				<input type="text" name="username" class="form-control">
			</div>
			<div class="form-group">
				<label>Mot de pass</label>
				<input type="text" name="password" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary" name="login"><i> Connexion</i></button>
		</form>
	</div>
</body>
</html>
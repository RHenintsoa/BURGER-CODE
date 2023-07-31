<?php 
	session_start();
	require('Database.php');
	$db = new Database('localhost','root','','burgercode');
		$oneMenu = $db->viewOneMenu(['name'=> $_GET['name']]);	
		
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
		<h2 class="text-center"> <i> <?php echo $oneMenu['name']; ?></i></h2>
		<div class="col-md-6">
			<h4> <?= $oneMenu['description']; ?></h4>
			<h4> <?= $oneMenu['price'].' €'; ?> </h4>
			<h4 style="display: none"> <?= $oneMenu['category']; ?> </h4> <!-- on a choisi de ne pas afficher la category juste pour le design-->
		</div>
		<div class="col-md-6">
			<img src="http://localhost/myall/BurgerCode/photo/<?php echo $oneMenu['image'];?>" class="img-responsive thumbnail">
		</div>

		<a href="menu.php" type="button" class="btn btn-warning"> <span class="bi bi-arrow-left"> retour</span> </a>
	</div>
</body>
</html>
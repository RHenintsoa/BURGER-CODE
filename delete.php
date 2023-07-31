<?php 
	session_start();
	require('Database.php');
	$db = new Database('localhost','root','','burgercode');
	
	if (isset($_POST['confirmDelete']) && isset($_GET['name'])) 
	{
		$delete = $db->deleteMenu(['name'=> $_GET['name']]);
		return header('Location:menu.php');
		
			
		
			
	}
	$oneMenu = $db->viewOneMenu(['name'=> $_GET['name']]);//ilaina mba nakan ny anaran'ilay menu hofafana
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
		<?php 	if (isset($message)):?>
			<div class="alert alert-default">
				<p> <?= $message;  ?></p>
			</div>
		<?php endif; ?>
		 

	<div class="container" style="width:500px; background: white; border-radius: 5px; padding: 30px;" >
		
		<form role="form" method="POST" action="delete.php?name=<?php echo $oneMenu['name']; ?>"> 
			<h3 class="text-center"> <i> Supprimer un menu </i></h3>
		<p> Voulez- vous supprimer <?php echo $oneMenu['name']; ?> de la liste des menus ? </p>
			<button type="submit" name="confirmDelete" class="btn btn-danger"> Supprimer </button>
			<button type="button" class="btn btn-warning"> Annuler </button>
		</form>
		

		</div>
	</div>
</body>
</html>
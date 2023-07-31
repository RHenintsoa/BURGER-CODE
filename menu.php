<?php 
	session_start();
	require('Database.php');
	$db = new Database('localhost','root','','burgercode');
	$views=$db->viewMenu();

	if (isset($_POST['confirmSearch'])&& !empty($_POST['search'])) 
	{	
		$search = $_POST['search'];
		$views = $db->researchMenu($search);

	}
	if (isset($_POST['logOut'])) 
	{
		session_destroy();
		header('Location:index.php');
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
	<div class="container-fluid">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<form role="form" method="POST" action="">
				<button type="submit" class="btn btn-default pull-right" name="logOut"> <i class="bi bi-gear-wide-connected">Se déconnecter </i></button>
			</form>
		</nav>
	</div>
	<div class="container">
		<h1 class="text-logo"><span class="fa fa-cutlery" id="iconeTitle"></span> BURGER CODE <span class="fa fa-cutlery"id="iconeTitle"></span></h1>
	</div>
	<div class="container" id="admin">
		<h1> Liste des menus <a href="insert.php" type="button" class="btn btn-success"><i class="bi bi-plus-circle"> Ajouter</i></a></h1>
		<div class="form-group"> 


			<form role="form" method="POST" action="menu.php"> 
				<input type="text" name="search" style="width:250px;height: 30px; margin-right: 20px; border-radius: 5px;">

				<button type="submit" name="confirmSearch" class="btn btn-info"> Rechercher </button>
			</form>

		</div>
		
		<table class="table  table-striped table-bordered">
			<thead>
					<tr>
						<th>Nom</th>
						<th>Description</th>
						<th>Prix</th>
						<th>Categorie</th>
						<th>Gestion</th>
					</tr>
			</thead>
			<?php foreach($views as $view): ?>	
			<tbody>
				<tr>
					<td> <?php echo $view['name']; ?> </td> 
					<td> <?php echo $view['description']; ?> </td>
					<td> <?php echo $view['price']; ?> </td>
					<td> <?php echo $view['category']; ?></td>
					<td>
						<a href="viewOneMenu.php?name=<?php echo $view['name']; ?>" type="button" class="btn btn-default"><i class="bi bi-lightbulb"> Voir </i></a>
						<a href="update.php?name=<?php echo $view['name'];?>" type="button" class="btn btn-primary"><i class="bi bi-pen"> Modifier </i></a>
						<a href="delete.php?name=<?php echo $view['name'];?>" type="button" class="btn btn-danger"><i class="bi bi-x"> supprimer </i></a>

					</td>
				</tr>
			</tbody>
			<?php endforeach; ?>
		</table>
		
	</div>
</body>
</html>
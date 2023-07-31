<?php 
	require('Database.php');	 
	$db= new Database('localhost','root','','burgercode');
	session_start();
	//Pour récupérer les noms de catégories
	$nameCategory = $db->getCategory();

	
	
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
				<button type="submit" class="btn btn-default pull-right" > <a href="connexion.php"><i class="bi bi-gear-wide-connected">Se connecter</i></a> </button>
		</nav>
	</div>
	<div class="container site">
		<h1 class="text-logo"><span class="fa fa-cutlery" id="iconeTitle"></span> BURGER CODE <span class="fa fa-cutlery"id="iconeTitle"></span></h1>
		<nav>
			<ul class="nav nav-pills">
				<?php foreach ($nameCategory as $name): ?>
					<li role="presentation" ><a href="#<?php echo $name['id']; ?>" data-toggle="tab"><?php echo $name['name']; ?></a> </li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<div class="tab-content">
			<?php 	foreach ($nameCategory as $name) :?>
			<div class="tab-pane active" id="<?php echo $name['id']; ?>"> <!-- Onglet menu-->
				<div class="row">
					
						<h2 class="text-center title"><?php echo $name['name']; ?> </h2>
						<!--Pour récupérer les contenus de chaque catégorie-->
							<?php 	$listItems = $db->listMenu($name['id']); ?>
									
							<?php 	foreach ($listItems as $items): ?>
					<div class="col-xs-6 col-md-4 "> <!-- Menu 1 de l'onglet menu-->
						<div class="thumbnail">
							<img src="http://localhost/myall/BurgerCode/photo/<?php echo $items['image']  ?>" alt="...">
							<div class="price"><?php echo $items['price']  ?></div>
							<div class="caption">
								<h4><?php echo $items['name']  ?></h4>
								<p><?php echo $items['description']  ?></p>
								<a href="#" class="btn btn-order" role="button"> 
									<i class="bi bi-cart2"> Commander</i> 
								</a>
							</div>
						</div>
					</div>
							<?php 	endforeach; ?>	
				</div>
			</div> <!--  fin Onglet menu-->

			<?php 	endforeach; ?>
		</div>
	</div>
</body>
</html>
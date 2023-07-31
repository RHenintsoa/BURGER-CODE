<?php 
	session_start();
	require('Database.php');
	$db = new Database('localhost','root','','burgercode');
	

	if (isset($_POST['confirmUpdate'])) 
	{
		$stockImage = './photo/';
		$image = $_FILES['image']['name'];
		$linkImage = $stockImage.$image;
		$extensionImage = strrchr($_FILES['image']['name'],'.');
		$extension = ['.jpg','.png','.jpeg'];

		$update = [
			'name' => $_POST['name'],
			'description' => $_POST['description'],
			'price' => $_POST['price'],
			'image'=>  $image,
			'category' => $_POST['category']
		];
		if (move_uploaded_file($_FILES['image']['tmp_name'], $linkImage)) 
		{

			$db->updateMenu($update);
			header('Location:menu.php');
			
		}
	}
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
		<h3 class="text-center"> <i> Effectuer une modification </i></h3>
		<div class="form-group"> 
			<form role="form" method="POST" action="update.php?name=<?php echo $oneMenu['name']; ?>" enctype="multipart/form-data"> 
				<div class="form-group">
					<label> Nom </label>
					<input type="text" name="name" class="form-control" value="<?php echo $oneMenu['name'];	 ?>">
				</div>
				<div class="form-group">
					<label> Description</label>
					<input type="text" name="description" class="form-control" value="<?php echo $oneMenu['description'];	 ?>">
				</div>
				<div class="form-group">
					<label> Prix </label>
					<input type="text" name="price" class="form-control" value="<?php echo $oneMenu['price'];	 ?>">
				</div>
				<div class="form-group">
					<label> Photo </label>
					<input type="file" name="image" class="form-control" >
				</div>
				<div class="form-group">
					<label for="category"> Categorie </label>
					<input type="number" name="category" class="form-control" id="category">
				</div>


				<button type="submit" name="confirmUpdate" class="btn btn-success"> Confirmer </button>
			</form>

		</div>
	</div>
</body>
</html>
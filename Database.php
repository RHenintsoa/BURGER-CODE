<?php 
	/**
	 * 
	 */
	class Database
	{
		public $host ='';
		public $username ='';
		public $password ='';
		public $dbname ='';
		public $pdo ='';
		
		function __construct($host,$username, $password, $dbname)
		{
			$this->host = $host;
			$this->dbname = $dbname;
			$this->username = $username;
			$this->password = $password;

			$this->pdo = new PDO('mysql:host='.$host.';dbname='.$dbname,$username,$password);

		}
		function connect($user)
		{
			$sql = 'SELECT * FROM users WHERE username= :username';
			$statement = $this->pdo->prepare($sql);
			$statement->execute(['username'=> $user['username']]);
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
				if ($result) 
				{
					$result['password'] = $user['password'];
					session_start();
					header('Location: menu.php');
				}
		}
		function insertMenu($menus)
		{
			$sql = 'INSERT INTO items (name,description,image,price,category) VALUES (:name,:description,:image,:price,:category )'; 
			$statement = $this->pdo->prepare($sql);
			$result = $statement->execute($menus);
				
		}
		function viewMenu()
		{
			$sql = 'SELECT name,description,price,category FROM items';
			$statement = $this->pdo->prepare($sql);
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}
		function viewOneMenu($name)
		{
			$sql = 'SELECT name,description,price,image,category FROM items WHERE name=:name';
			$statement = $this->pdo->prepare($sql);
			$statement->execute($name);
			return $statement->fetch(PDO::FETCH_ASSOC);
				
		}
			function updateMenu($update)
		{
			$sql = 'UPDATE items SET name=:name, description=:description, price=:price, image=:image, category=:category';
			$statement = $this->pdo->prepare($sql);
			$result = $statement->execute($update);
			
				
		}
		function deleteMenu($name)
		{
			$sql = 'DELETE FROM items WHERE name = :name';
			$statement = $this->pdo->prepare($sql);
			$result = $statement->execute($name);

		}
		function researchMenu($search)
		{
			$sql = 'SELECT * FROM items WHERE name LIKE :search OR description LIKE :search ';
			$statement = $this->pdo->prepare($sql);
			$statement->execute(['search' =>'%'.$search.'%']);
			return $statement->fetchAll(PDO:: FETCH_ASSOC);
		}
		function getCategory()
		{
			$sql = 'SELECT * FROM categories';
			$statement = $this->pdo->prepare($sql);
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
				
		}
		function listMenu($category)
		{
			$sql = 'SELECT * FROM items WHERE category=:category' ;
			$statement = $this->pdo->prepare($sql);
			$statement->execute(['category'=>$category]);
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}
	}

?>
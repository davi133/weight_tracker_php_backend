<?php 

	function getDB($useDB = true) {

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbName = "wtBack";

		try
		{
			$conn = new PDO ("mysql:host=$servername;",$username,$password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if ($useDB)
				$conn->exec("USE $dbName;");
			return $conn;
		
		}
		catch(PDOException $e) 
		{
			echo "Connection failed: " . $e->getMessage();
			return null;
		}
	}

	function initializeDB()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbName = "wtBack";

		$conn = getDB(false);
		$conn->exec( "CREATE DATABASE IF NOT EXISTS $dbName");
		$conn->exec("USE $dbName");

		//Tabela de usuários
		$sql = "CREATE TABLE IF NOT EXISTS users ( 
					id INT unsigned PRIMARY KEY AUTO_INCREMENT, 
					username VARCHAR (30) DEFAULT NULL,
					email varchar (40) not null,
					senha varchar (30) not null
					);";
		$conn->exec($sql);

		//Tabela de weight registers
		//TODO
		

		$conn = null;
		echo "database initialized";
	}	

	function deleteDB()
	{
		$dbName = "wtBack";

		$conn = getDB(false);
		$conn->exec( "DROP DATABASE $dbName");
		
		
		
		$conn = null;
		echo "database deleted";
	}

?>
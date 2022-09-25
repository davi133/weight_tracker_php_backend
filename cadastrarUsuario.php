<?php 
	
	include_once "banco.php";
	header("Access-Control-Allow-Origin: *");


	$response = array();


	$conn = getDB();
	
	$sql = "INSERT INTO users (username,email,senha)
	VALUES ('John', 'Doe', 'john@example.com')";
	// use exec() because no results are returned
	$result = $conn->exec($sql);
	
	
	$response["linhas"] = $result;
	if ($result != 0)
	{
		$response["sucesso"] = true;
		$response["message"] = "Usuário cadastrado com sucesso";
	}
	else
	{
		$response["sucesso"] = false;
		$response["message"] = "Usuário cadastrado com sucesso";
	}
	echo json_encode($response);

?>	
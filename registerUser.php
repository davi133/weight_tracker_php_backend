<?php 
	include_once "banco.php";
	
	header("Access-Control-Allow-Origin: *");

	$response = array(	"linhas" => 0,
					  	"sucesso" => false,
						"message"=> "...",
						"insertedId"=>-1);

	$conn = getDB();
	
	$stmt = $conn->prepare("SELECT * FROM users WHERE email = '{$_POST['email']}'");
  	$stmt->execute();

  	// set the resulting array to associative
  	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$bank = $stmt->fetchAll();

  	if ($bank && count($bank)>0)
	{
		$response["message"] = "Email já utilizado";
		echo json_encode($response);
		exit();
	}
	else
	{
		$sql = "INSERT INTO users (username,email,senha)
		VALUES ('{$_POST['name']}', '{$_POST['email']}', '{$_POST['senha']}')";
		$result = $conn->exec($sql);

		$response["linhas"] = $result;

		if ($result != 0)
		{
			$response["sucesso"] = true;
			$response["message"] = "Usuário cadastrado com sucesso";
			$response["insertedId"] = $conn->lastInsertId();
		}
		else
		{
			$response["message"] = "Algo deu errado";
		}
	}

	$conn = null;
	echo json_encode($response);

?>	
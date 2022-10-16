<?php
    include_once "banco.php";
	
	header("Access-Control-Allow-Origin: *");

	$response = array(	"sucesso" => false,
						"message"=> "...",
						"userId"=>-1);
    
    $conn = getDB();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email='{$_POST['email']}' AND senha = '{$_POST['senha']}'");
  	$stmt->execute();

  	// set the resulting array to associative
  	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$bank = $stmt->fetchAll();
    if ($bank && count($bank))
    {
        $response["sucesso"] = true;
        $response["message"] = "Pode Entrar";
        $response["userId"] = intval($bank[0]['id']);
    }
    else
    {
        $response["sucesso"] = false;
        $response["message"] = "Usuário ou senha incorretos";
        
    }

    echo json_encode($response);

    
?>

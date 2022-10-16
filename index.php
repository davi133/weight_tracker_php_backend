<?php 
	include_once "banco.php";
	header("Access-Control-Allow-Origin: *");
	


	foreach($_POST as $x => $x_value) {
		echo "Key=" . $x . ", Value=" . $x_value;
		echo "<br>";
	}

	//$db = getDB();
	
	

	//echo "bom dia";
	echo "👍";
	initializeDB();


	

?>
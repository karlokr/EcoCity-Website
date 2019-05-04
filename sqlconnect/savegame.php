<?php
	$con = mysqli_connect('localhost', 'pillarmen', '', 'ecocity');

	//check that connection happened
	if (mysqli_connect_errno()){
		echo "1: Connection failed."; //error code #1 = connection failed
		exit();
	}
	
	$username = mysqli_real_escape_string($con, $_POST["name"]);
	$id = mysqli_real_escape_string($con, $_POST["id"]);
	$ecoscore = mysqli_real_escape_string($con, $_POST["ecoscore"]);
	$savedata = mysqli_real_escape_string($con, $_POST["savedata"]);

	$insertsavequery = "INSERT INTO savegames (id, ecoscore, savedata) VALUES ('" . $id . "', '" . $ecoscore . "', '" . $savedata . "');";

	mysqli_query($con, $insertsavequery) or die("7: Add save game failed"); //error code #4 = insert query failed
		
	echo("0");
?>

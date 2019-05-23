<?php
	$con = mysqli_connect('localhost', 'pillarmen', '', 'ecocity');

	//check that connection happened
	if (mysqli_connect_errno()){
		echo "1: Connection failed."; //error code #1 = connection failed
		exit();
	}
	
	$username = mysqli_real_escape_string($con, $_POST["name"]);
	$id = mysqli_real_escape_string($con, $_POST["id"]);
        $level = mysqli_real_escape_string($con, $_POST["level"]);
	$ecoscore = mysqli_real_escape_string($con, $_POST["ecoscore"]);
	$savedata = mysqli_real_escape_string($con, $_POST["savedata"]);

	$insertsavequery = "INSERT INTO savegames (id, username, level, ecoscore, game_data) VALUES ('" . $id . "', '" . $username . "', '" . $level . "', '" . $ecoscore . "', '" . $savedata . "');";

	mysqli_query($con, $insertsavequery) or die("7: Add save game failed"); //error code #4 = insert query failed
		
	echo("0");
?>

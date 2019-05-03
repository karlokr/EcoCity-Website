<?php
	$con = mysqli_connect('localhost', '', '', 'ecocity');

	//check that connection happened
	if (mysqli_connect_errno()){
		echo "1: Connection failed."; //error code #1 = connection failed
		exit();
	}
	
	$username = mysqli_real_escape_string($con, $_POST["name"]);
	$id = mysqli_real_escape_string($con, $_POST["id"]);
	//$ecoscore = mysqli_real_escape_string($con, $_POST["ecoscore"]);
	//$savedata = mysqli_real_escape_string($con, $_POST["savedata"]);
	$ecoscore = 10;
	$savedata = "ienintfpt";
	$save_num = mysqli_real_escape_string($con, $_POST["save_num"]);
	
	$updatequery = "UPDATE savegames SET ecoscore=" . $ecoscore . ", savedata='" . $savedata . "' WHERE save_num=" . $save_num . ";";
	
	mysqli_query($con, $updatequery) or die("8: Update save game unsuccessful." . $save_num . $id . $username);
		
	echo("0");
?>

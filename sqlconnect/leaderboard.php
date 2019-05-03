<?php
	$con = mysqli_connect('localhost', 'pillarmen', '', 'ecocity');

	//check that connection happened
	if (mysqli_connect_errno()){
		echo "1: Connection failed."; //error code #1 = connection failed
		exit();
	}
	
	$updatequery = "UPDATE savegames SET ecoscore=" . $ecoscore . ", savedata='" . $savedata . "' WHERE save_num=" . $save_num . ";";
	
	mysqli_query($con, $updatequery) or die("8: Update save game unsuccessful." . $save_num . $id . $username);
		
	echo("0");
?>
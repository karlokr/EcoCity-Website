<?php
	$con = mysqli_connect('localhost', 'pillarmen', '', 'ecocity');

	//check that connection happened
	if (mysqli_connect_errno()){
		echo "1: Connection failed."; //error code #1 = connection failed
		exit();
	}
	
	$updatequery = "SELECT * FROM (SELECT username, ecoscore FROM savegames ORDER BY ecoscore DESC) WHERE ROWNUM < 10;";
	
	$leaderboard = mysqli_query($con, $updatequery) or die("9: Leaderboard query failed");
		
	echo("0" . $leaderboard);
?>
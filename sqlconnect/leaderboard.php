<?php
	$con = mysqli_connect('localhost', 'pillarmen', '', 'ecocity');

	//check that connection happened
	if (mysqli_connect_errno()){
		echo "1: Connection failed."; //error code #1 = connection failed
		exit();
	}
    
    	$pageno = mysqli_real_escape_string($con, $_POST["pageno"]);
	$gamemode = mysqli_real_escape_string($con, $_POST["game_mode"]);
	$level = mysqli_real_escape_string($con, $_POST["level"]);
	
	$leaderboardquery = "SELECT username, ecoscore FROM savegames WHERE game_mode='" . $gamemode . "' AND level='" . $level . "' ORDER BY ecoscore DESC LIMIT " . $pageno . "," . ($pageno + 5) . ";";
	
	$leaderboard = mysqli_query($con, $leaderboardquery) or die("9: Leaderboard query failed");
	
	$rows = array();
	while ($r = mysqli_fetch_assoc($leaderboard)) {
		$rows[] = $r;
	}
	
	echo("0" . "\t" . json_encode($rows));
?>

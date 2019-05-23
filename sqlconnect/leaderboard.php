<?php
	$con = mysqli_connect('localhost', 'root', '', 'ecocity');

	//check that connection happened
	if (mysqli_connect_errno()){
		echo "1: Connection failed."; //error code #1 = connection failed
		exit();
	}
    
    	$pageno = mysqli_real_escape_string($con, $_POST["pageno"]);
	$gamemode = mysqli_real_escape_string($con, $_POST["game_mode"]);
	$level = mysqli_real_escape_string($con, $_POST["level"]);
	
	if ($pageno == 0){
		$startindex = 0;
		$endindex = 5;
	} else {
		$startindex = $pageno * 5;
		$endindex = $startindex + 5;
	}

	$leaderboardquery = "SELECT username, ecoscore FROM savegames WHERE level='" . $level . "' ORDER BY cast(savegames.ecoscore as int) DESC LIMIT " . $startindex . "," . $endindex . ";";
	
	$leaderboard = mysqli_query($con, $leaderboardquery) or die("9: Leaderboard query failed");
	
	$rows = array();
	while ($r = mysqli_fetch_assoc($leaderboard)) {
		$rows["leaderboard"][] = $r;
	}

	$recordsquery = "SELECT COUNT(*) FROM savegames WHERE level='" . $level . "';";

        $records = mysqli_query($con, $recordsquery) or die("9: Leaderboard query failed");

	$count = mysqli_fetch_array($records);

	echo("0" . "\t" . json_encode($rows) . "\t" . $count[0]);
?>

<?php
	$con = mysqli_connect('localhost', 'pillarmen', '', 'ecocity');

	//check that connection happened
	if (mysqli_connect_errno()){
		echo "1: Connection failed."; //error code #1 = connection failed
		exit();
	}
	
	$username = mysqli_real_escape_string($con, $_POST["name"]);
	$password = mysqli_real_escape_string($con, $_POST["password"]);

	//check if name exists
	$namecheckquery = "SELECT username FROM users WHERE username='" . $username . "';";
	
	$namecheck = mysqli_query($con, $namecheckquery) or die("2: Name check query failed"); //error code #2 = name check query failed

	if (mysqli_num_rows($namecheck) > 0) {
		echo "3: Name already exists"; //error code #3 = name already exists cannot register
		exit();
	}

	$file = "";
        $salt = fgets(fopen($file, 'r')) . $username . "\$";
	$salt = preg_replace('/\s+/', ' ', trim($salt));
	$hash = crypt($password, $salt);
	
	$insertuserquery = "INSERT INTO users (username, hash) VALUES ('" . $username . "', '" . $hash . "');";

	mysqli_query($con, $insertuserquery) or die("4: Insert player query failed"); //error code #4 = insert query failed
	
	//get id of new user from db
	$idquery = "SELECT id FROM users WHERE username='" . $username . "';";
	
	$idresult = mysqli_query($con, $idquery) or die("10: User ID lookup failed"); //error code #10 = user id lookup failed
	
	//get login info from query
	$iddb = mysqli_fetch_assoc($idresult);
	$id = $iddb["id"];
	
	echo("0" . "\t" . $id);
?>

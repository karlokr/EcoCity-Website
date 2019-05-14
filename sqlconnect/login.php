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
	$namecheckquery = "SELECT username, hash, id FROM users WHERE username='" . $username . "';";
	
	$namecheck = mysqli_query($con, $namecheckquery) or die("2: Name check query failed"); //error code #2 = name check query failed

	if (mysqli_num_rows($namecheck) != 1) {
		echo "5: Either no user with name or more than one"; //error code #3 = Either no user with name or more than one
		exit();
	}
	
	//get login info from query
	$existinginfo = mysqli_fetch_assoc($namecheck);
	$hash = $existinginfo["hash"];
	
	
	if (!password_verify($password, $hash)) {
		echo "6: Incorrect password." . $salt; //error code #6 = password does not hash to match table
		exit();
	}
	
	echo "0\t" . $existinginfo["id"];


?>

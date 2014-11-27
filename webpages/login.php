<!--
	COSC 213 Final Project
	Taylor Morrow - 300189378
	Mike Dupree - 300
-->

<?php
	if (!(filter_input(INPUT_POST,'email')) || 
		!(filter_input(INPUT_POST, 'password'))) { //check if both fields have text

		header("Location: ../login.html");
		exit;
	}
	
	$con = mysqli_connect("localhost","tmorrow","letmein","finalProject"); //connect to finalProject

	$taremail = filter_input(INPUT_POST, 'email');
	$tarpasswd = filter_input(INPUT_POST, 'password');

	$sql = "SELECT firstname, lastname FROM members WHERE email = '".$taremail."' 
			AND password = PASSWORD('".$tarpasswd."')";

	$result = mysqli_query($con, $sql) or die(mysqli_error($con));

	while ($info = mysqli_fetch_array($result)) {
		$f_name = stripslashes($info['firstname']);
		$l_name = stripslashes($info['lastname']);
	}

	setcookie("auth", "1", time()+60*30, "/", "", 0); //create cookie for the logged in user

	header("Location: services.php"); //redirected to services webpage

?>

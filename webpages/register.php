<!--
	COSC 213 Final Project
	Taylor Morrow - 300189378
	Mike Dupree - 300
-->

<?php
	//Using finalProject database
	if (!(filter_input(INPUT_POST,'firstname')) || 
		!(filter_input(INPUT_POST,'lastname')) || 
		!(filter_input(INPUT_POST,'email')) || 
		!(filter_input(INPUT_POST, 'password'))) {
			
			header("Location: register.html");
			exit;
	}
	
	$con = mysqli_connect("localhost","tmorrow","letmein","finalProject"); //connect to finalProject

	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$email = strtolower($_POST['email']);
	$passwd = $_POST['password'];
	
	$taremail= filter_input(INPUT_POST, 'email');

	$select_sql = "SELECT firstname, lastname FROM members WHERE email = '".$taremail."'";

	$select_res = mysqli_query($con, $select_sql) or die(mysqli_error($con));

	if(mysqli_num_rows($select_res) > 0){ //if the email is located in the table
		echo "Your email address has already been used! Please use a different email.</br>";
		echo "<a href=\"register.html\">Click here to return to the registration page!</a>";
	} 
	else{
		mysqli_query($con,"INSERT INTO members (firstname, lastname, email, password)
						   VALUES ('$fname', '$lname', '$email', PASSWORD('$passwd'))");

		mysqli_commit($con);

		echo "<h2>Thanks, ".$fname." ".$lname.", for signing up to Rebel Cloud Cantina!</h2></br>";
		echo "<a href=\"../login.html\">Click here to return to the login page</a>";
		mkdir("C:/xampp/htdocs/FinalProject/members/$email", 0733, true); //creates a folder for each unique member
	}

	while ($info = mysqli_fetch_array($select_res)) {
		$f_name = stripslashes($info['firstname']);
		$l_name = stripslashes($info['lastname']);
	}

	mysqli_close($con);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Rebel Cloud Cantina</title>
	</head>
	<body>
	</body>
</html>
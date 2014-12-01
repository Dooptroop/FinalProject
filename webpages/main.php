<!--
	COSC 213 Final Project
	Taylor Morrow - 300189378
	Mike Dupree - 300182241
-->

<?php 
	if (filter_input (INPUT_COOKIE, 'auth') == "1") {
		$display = "<h2 id='header'>You have successfully logged in!</h2>
					<p>Navigate through the links below as you wish!</p>
					<a id='link' href=\"../contact.html\">Contact Us!</a></br></br>
					<a id='logout' href=\"../index.html\">Log out</a>";
	} else {
		header("Location: ../login.html");
		exit;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Rebel Cloud Cantina</title>
		<link rel="stylesheet" type="text/css" href="../css/main.css">
	</head>
	<div class="display">
		<body>
			<?php echo "$display"; ?>
		</body>
	</div>
</html>

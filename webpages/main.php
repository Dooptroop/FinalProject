<!--
	COSC 213 Final Project
	Taylor Morrow - 300189378
	Mike Dupree - 300182241
-->

<?php 
	if (filter_input (INPUT_COOKIE, 'auth') == "1") {
		$display = "<h2>You have successfully logged in!</h2>
					<p>Navigate through the links below as you wish!</p>
					<ul>
						<li><a href=\"feedback.php\">Feedback Page</a></li>
						<li><a href=\"forum.php\">Forum Page</a></li>
					</ul>
					<a href=\"../index.html\">Log out</a>";
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
	</head>
	<body>
		<?php echo "$display"; ?>
	</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/1.css">
</head>

<body>

<header>
	<img src="images/KingLibLogo.jpg">
</header>

<main>
	<p><b>Thank You for Registering!</b></p>
	
	<?php
		
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
			$fullName = $firstName.' '.$lastName;
		$email = $_POST['email'];
		$city = $_POST['city'];
		
		print	"<p>Name: ".$fullName."</p>\n";
		print	"<p>Email: ".$email."</p>\n";
		print	"<p>City: ".$city."</p>\n";
		
	?>
	
</main>

</body>
</html>
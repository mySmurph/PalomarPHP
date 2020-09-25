<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/KingLib.css">
</head>
<?php	/*----------call external php functions---------*/
	include "assignment_8_common_functions.php";
	$db = connectDatabase();
	$patron = Patron();
?>
<body>

<header>
	<a href="assignment_8.php"><img src="images/KingLibLogo.jpg"></a>
</header>

<main>

<div class="info">		
	<?php
		$firstName = trim($_POST['firstName']);
		$lastName = trim($_POST['lastName']);
		$email = trim($_POST['email']);
		$birthYear = trim((int)$_POST['year']);
		$city = $_POST['city'];
		$userid = $_POST['userid'];
		$password = $_POST['password'];
		
		$validationResult = doValidation($db,$firstName,$lastName,$email,$birthYear,$city, $patron, $userid, $password);
		
		if ($validationResult == ''){		/*no errors found*/
			addPatron($db, $firstName, $lastName, $email, $birthYear, $city, $patron, $userid, $password);
		}else{ 						/*errors found*/
			print $validationResult;
			print "<p>Go BACK and make corrections";
		}

	?>
		<p>
			For Admin Use Only: <a href="assignment_8_view_patrons.php">View Patrons</a>
		</p>
</div>
</main>
<div id='serverinfo'>

	<?php
		 detectServer();
	?>

</div>
</body>
</html>
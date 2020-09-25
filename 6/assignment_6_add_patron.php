<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/KingLib.css">
</head>
<?php	/*----------call external php functions---------*/
	include "assignment_6_common_functions.php";
	$db = connectDatabase();
	$patron = Patron();
?>
<body>

<header>
	<a href="assignment_6.php"><img src="images/KingLibLogo.jpg"></a>
</header>

<main>

<div class="info">		
	<?php
		$firstName = trim($_POST['firstName']);
		$lastName = trim($_POST['lastName']);
		$email = trim($_POST['email']);
		$birthYear = trim((int)$_POST['year']);
		$city = $_POST['city'];
		
		$validationResult = doValidation($db,$firstName,$lastName,$email,$birthYear,$city, $patron);
		
		if ($validationResult == ''){		/*no errors found*/
			addPatron($db, $firstName, $lastName, $email, $birthYear, $city, $patron);
		}else{ 						/*errors found*/
			print $validationResult;
			print "<p>Go BACK and make corrections";
		}

	?>
		<p>
			For Admin Use Only: <a href="assignment_6_view_patrons.php">View Patrons</a>
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
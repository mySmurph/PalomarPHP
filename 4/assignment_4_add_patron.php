<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/KingLib_4.css">
</head>
<?php	/*----------call external php functions---------*/
	include "assignment_4_common_functions.php";
?>
<body>

<header>
	<a href="assignment_4.php"><img src="images/KingLibLogo.jpg"></a>
</header>

<main>

<div class="info">		
	<?php
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
			$fullName = $firstName.' '.$lastName;
		$email = $_POST['email'];
		$birthYear = $_POST['year'];
			$currentYear = date('Y');
			$age = $currentYear-$birthYear;
		$city = $_POST['city'];
		
		$validationResult = doValidation($firstName,$lastName,$email,$birthYear,$city);
		
		if ($validationResult == ''){		/*no errors found*/
			addPatron($firstName,$lastName,$email,$birthYear,$city);
			writePatron($firstName,$lastName,$email,$birthYear,$city);
		}else{ 						/*errors found*/
			print $validationResult;
			print "<p>Go BACK and make corrections";
		}

	?>
		<p>
			For Admin Use Only: <a href="assignment_4_view_patrons.php">View Patrons</a>
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
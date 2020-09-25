<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/KingLib_2.css">
</head>

<body>

<header>
	<img src="images/KingLibLogo.jpg">
</header>

<main>
<span class="info">
		
	<?php
		
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
			$fullName = $firstName.' '.$lastName;
		$email = $_POST['email'];
		$birthYear = $_POST['year'];
			$yearDigit = strlen($birthYear);
			$currentYear = date('Y');
			$age = $currentYear-$birthYear;
		$city = $_POST['city'];
		
		
		$errorFoundFlag = 'N';  //Initialize variable to 'N' 

	/*firstName*/
		if (empty($firstName)){
			print "<p>Error: you must enter a First Name</p>\n";
			$errorFoundFlag = 'Y';
		}
	/*lastName*/
		if (empty($lastName)){
			print "<p>Error: you must enter a Last Name</p>\n";
			$errorFoundFlag = 'Y';
		}
	/*email*/
		if (empty($email)){
			print "<p>Error: you must enter an Email</p>\n";
			$errorFoundFlag = 'Y';
		}
	/*year*/
		if (empty($birthYear) || !is_numeric($birthYear) || $yearDigit != 4){
			print "<p>Error: you must enter a Birth Year</p>\n";
			$errorFoundFlag = 'Y';
		}
	/*city*/
		if($city == "-"){
			print "<p>Error: you must select a City</p>\n";
		}
	
		if ($errorFoundFlag == 'Y'){		/*errors found*/
			print "<p>Go BACK and make corrections";
		}else{ 								/*no errors found*/
			print	"<p><b>Thank You for Registering!</b></p>\n";
			print	"<p>Name: $fullName</p>\n";
			print	"<p>Email: $email</p>\n";
			print	"<p>City: $city</p>\n";
			print	"<p>Section: ";
				if($age<=15){
					print	"Children";
				}else if ($age<=54){
					print	"Adult";
				}else if ($age>=55){
					print	"Senior";
				}
			print	"</p>\n";
		}

	?>
</span>
</main>

</body>
</html>
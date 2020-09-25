
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/KingLib.css">
</head>
<?php	/*----------call external php functions---------*/
	include "assignment_8_common_functions.php";
	$db = connectDatabase();
?>
<body>

<header>
	<a href="assignment_8.php"><img src="images/KingLibLogo.jpg"></a>
</header>

<main>
<div class="info">	

	<form method="post" action=" assignment_8_add_patron.php">
		<p>Please sign up</p>
		<p>First Name:<br>
		<input type="text" name="firstName" size="30"></p>
		
		<p>Last Name:<br>
		<input type="text" name="lastName" size="30"></p>
		
		<p>Email:<br>
		<input type="text" name="email" size="40"></p>
		
		<p>Birth Year:<br>
		<input type="text" name="year" size="4"></p>
		
		<p>City of Residence<br>
			<select name="city" size="1">
				<option value="-">-</option>
			
					<?php
						getCities($db);
					?>
			</select>
		</p>
		<p>
			Choose User ID and Password<br>
			(10 character max)
		</p>
		<p>
			User ID: <input type = "text" name= "userid" size="15">
			Password: <input type = "password" name= "password" size="15">
		</p>
		<input type="submit" value="Submit Information">
	</form>
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
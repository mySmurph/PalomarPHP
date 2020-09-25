
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

	<form method="post" action=" assignment_4_add_patron.php">
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
						$filename = 'data/'.'cities.txt';
						$lines_in_file = count(file($filename));
						$fp = fopen($filename, 'r');  		 //opens the file for reading
						for ($ii = 1; $ii <= $lines_in_file; $ii++){
							$line = fgets($fp);  		//Reads one line from the file
							$city = trim($line);
							print "<option value=\"".$city."\">".$city."</option>";
						}
						fclose($fp);
					?>
			</select>
		</p>
		
		<input type="submit" value="Submit Information">
	</form>
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
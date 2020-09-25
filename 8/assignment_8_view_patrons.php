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
	
	<table border = '1'>
		<tr>
			<th>Last Name</th>
			<th>First Name</th>
			<th>Email</th>
			<th>City</th>
			<th>Birth Year</th>
			<th>User ID</th>
			<th>Password</th>
		</tr>
		
	<?php
		viewPatrons($db, $patron);
	?>
	</table>
</div>
</main>
<div id='serverinfo'>

	<?php
		 detectServer();
	?>

</div>
</body>
</html>
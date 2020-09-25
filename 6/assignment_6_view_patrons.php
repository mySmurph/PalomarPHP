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
	
	<table border = '1'>
		<tr>
			<th>Last Name</th>
			<th>First Name</th>
			<th>Email</th>
			<th>City</th>
			<th>Birth Year</th>
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
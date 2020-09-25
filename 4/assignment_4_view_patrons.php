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
	
	<table border = '1'>
		<tr>
			<th>Last Name</th>
			<th>First Name</th>
			<th>Email</th>
			<th>City</th>
			<th>Birth Year</th>
		</tr>
		
	<?php
		viewPatrons();
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
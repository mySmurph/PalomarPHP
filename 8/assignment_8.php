<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/KingLib.css">
</head>

<body>
<?php	/*----------call external php functions---------*/
	include "assignment_8_common_functions.php";
	$db = connectDatabase();
?>
<header>
	<a href="assignment_8.php"><img src="images/KingLibLogo.jpg"></a>
</header>

<main>



<div id= "featuredtitle">
	<h4>Featured Title</h4>

	<img src="images/book_children_of_men.jpg">
</div>

<div id = "stafflist">

	<h4>Our Staff</h4>
	
	<table>
		<tr>
			<td>
					<img src="images/staff_lee.jpg">
			</td>
			<td>
					<img src="images/staff_shirley.jpg">
			</td>
			<td>
					<img src="images/staff_tom.jpg">
			</td>
		</tr>
	</table>
</div>



<div id = "findtitle">
	<h4>Enter KeyWord to Search for Titles</h4>
	<form method="post" action = "assignment_8_booklist.php">
		<p>
			<input type= "text" name = "key_word" size = 30><br>
			(leave blank it list all titles)
		</p>
		<p>
			<input type = "submit" value = "Find Titles">
		</p>
	</form>
</div>

<div id = "logon">
	<h4>Logon to Your Account</h4>
	<form method="post" action = "assignment_8_logon.php">
		<table>
			<tr>
				<td>
					User ID:
				</td>
				<td>
					<input type = "text" name= "userid" size="15">
				</td>
			</tr>
			<tr>
				<td>
					Password:
				</td>
				<td>
					<input type = "password" name= "password" size="15">
				</td>
			</tr>
		</table>
		<p>
			<input type = "submit" value = "Logon">
		</p>
	</form>
	<p>
		<a href="assignment_8_register.php" value = "click to register">Click to Register</a>
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
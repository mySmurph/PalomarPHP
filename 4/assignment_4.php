<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/KingLib_4.css">
</head>

<body>
<?php	/*----------call external php functions---------*/
	include "assignment_4_common_functions.php";
?>
<header>
	<a href="assignment_4.php"><img src="images/KingLibLogo.jpg"></a>
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
	<form method="post" action = "assignment_4_booklist.php">
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
	<p>
		<a href="assignment_4_register.php" value = "click to register">Click to Register</a>
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
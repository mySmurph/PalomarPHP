<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/KingLib.css">
</head>
<?php	/*----------call external php functions---------*/
	include "assignment_6_common_functions.php";
	$db = connectDatabase();
?>
<body>

<header>
	<a href="assignment_6.php"><img src="images/KingLibLogo.jpg"></a>
</header>

<main>
		
<div class="info">
<?php
	$keyWord = $_POST["key_word"];
	$bookList = keyWord($db, $keyWord);
	print $bookList;
?>
</div>
</main>
<div id='serverinfo'>

<?php
	detectServer();
?>

</div>
</body>
</html>
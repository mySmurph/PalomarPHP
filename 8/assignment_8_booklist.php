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
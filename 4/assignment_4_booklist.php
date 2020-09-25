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
<?php
	$keyWord = $_POST["key_word"];
	$bookList = keyWord($keyWord);
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
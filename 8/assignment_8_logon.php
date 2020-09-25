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
<?php
	$userid = $_POST["userid"];
	$password = $_POST["password"];
	logon($db, $patron, $userid, $password);

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
<html>
<head>
  <title>0811_Common_Functions_Tester_mysqli</title>
  <link rel="stylesheet" href="http://profperry.com/Classes/Main.css" type="text/css">

</head>

<body style="font-family: Arial, Helvetica, sans-serif; color: Blue; background-color: silver;">

<h2 style="background-color: #F5DEB3;">Display Data using Include File</h2>

<?php

include "0811_common_functions_mysqli_PA.php";

$db = connectDatabase();     // Function in 0811_common_functions_mysqli_PA.php


//**********************************************
//*
//*  SELECT from table and display Results
//*
//**********************************************

$sql_statement  = "SELECT lastname, firstname, state ";
$sql_statement .= "FROM author ";
$sql_statement .= "ORDER BY lastname, firstname ";

$sqlResults = selectResults($db, $sql_statement);     // Function in 0811_common_functions_mysqli_PA.php

$error_or_rows = $sqlResults[0];

if (substr($error_or_rows, 0 , 5) == 'ERROR')
{
	$outputDisplay .= "<br />Error on DB";
	$outputDisplay .= $error_or_rows;
} else {

	$arraySize = $error_or_rows;

	$outputDisplay .= '<table border=1 style="color: black;">';
	$outputDisplay .= '<tr><th>Last Name</th><th>First Name</th></tr>';

	for ($i=1; $i <= $error_or_rows; $i++)
	{
		$myrowcount++;

		$firstname = $sqlResults[$i]['firstname'];
		$lastname = $sqlResults[$i]['lastname'];

		$outputDisplay .= "<tr>";
			$outputDisplay .= "<td>".$lastname."</td>";
			$outputDisplay .= "<td>".$firstname."</td>";
		$outputDisplay .= "</tr>";
	}

	$outputDisplay .= "</table>";
}

?>

<hr size="4" style="background-color: #F5DEB3; color: #F5DEB3;" />

<?php
	$outputDisplay .= "<br /><br /><b>Number of Rows in Results: $myrowcount </b><br /><br />";
	print $outputDisplay;
?>


</form>
</body>
</html>
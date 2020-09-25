<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Test DB</title>

	<link rel="stylesheet" type="text/css" href="css/kinglib_6.css" />

</head>

<body>
<h1>Test Database Connection</h1>

<?php

    $db = connectDatabase();

	if ($db)
	{
		displayCity($db);
	} else {
		print "<br>Did not connect to the Data";
	}

?>

</body>
</html>

<?php

function connectDatabase()
{
	//**********************************************
	//*
	//*  Connect to MySQL and Database
	//*
	//**********************************************

		 require('../../DBtest_pptest.php');

		 $host =  'localhost';
		 $userid =  'P25';
		 $password = '7dosql7';
		 $dbname = 'testdb';

		 $db = mysqli_perry_pconnect($host, $userid, $password, $dbname);

		 if (!$db)
		 {
		     print "<h1>Unable to Connect to MySQLi</h1>";
		     exit;
		 }

	     return $db;
}


function displayCity($db)
{

	$sql_statement  = "SELECT name ";
	$sql_statement .= "FROM city ";
	$sql_statement .= "ORDER BY name ";

	$result = mysqli_query($db, $sql_statement);

	if (!$result)
	{
				$output .= "ERROR";
				$output .= "<p style='color: red;'>MySQL No: ".mysqli_errno($db)."<br>";
				$output .= "MySQL Error: ".mysqli_error($db)."<br>";
				$output .= "<br>SQL: ".$sql_statement."<br>";
				$output .= "<br>MySQL Affected Rows: ".mysqli_affected_rows($db)."</font><br>";

	} else {

				$numresults = mysqli_num_rows($result);

				for ($i = 0; $i < $numresults; $i++)
				{
					$row = mysqli_fetch_array($result);

	                $name = $row['name'];

	                print "<br>$name";

				}
		}
}
?>


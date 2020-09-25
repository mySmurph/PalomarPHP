<?php

function connectDatabase()
{
		//**********************************************
		//*
		//*  Detect Server
		//*
		//**********************************************

		$server = $_SERVER['SERVER_NAME'];

		$positionFound = strpos($server, 'profperry');

		if ($positionFound === false)
		{
			$server = 'localhost';
		} else {
			$server = 'Practice Area';
		}


		//**********************************************
		//*
		//*  Connect to MySQL and Database
		//*
		//**********************************************

		if ($server == "Practice Area")
		{
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

		} else {

			$db = mysqli_connect('localhost','root','', 'test');

			if (!$db)
			{
				print "<h1>Unable to Connect to MySQL</h1>";
			}
		}

		return $db;
}

function selectResults($db, $statement)
{

	$output = "ERROR: ";
	$outputArray = array();

	$result = mysqli_query($db, $statement);

	if (!$result) {
		$output .= "<p style='color: red;'>MySQL No: ".mysqli_errno($db)."<br>";
		$output .= "MySQL Error: ".mysqli_error($db)."<br>";
		$output .= "<br>SQL: ".$statement."<br>";
		$output .= "<br>MySQL Affected Rows: ".mysqli_affected_rows($db)."</p>";

		array_push($outputArray, $output);

	} else {

		$numresults = mysqli_num_rows($result);

		array_push($outputArray, $numresults);

		for ($i = 0; $i < $numresults; $i++)
		{
			$row = mysqli_fetch_array($result);

			array_push($outputArray, $row);
		}
	}

	return $outputArray;
}


?>
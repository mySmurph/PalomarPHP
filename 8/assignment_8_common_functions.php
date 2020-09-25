<?php
function Patron(){
	$patronDB = "patron";
	return $patronDB;
}
function connectDatabase(){	//mySQL
	require('../../DBtest_pptest.php');

	$host =  'localhost';
	$userid =  'P25';
	$password = '7dosql7';
	$dbname = 'testdb';

	$db = mysqli_perry_pconnect($host, $userid, $password, $dbname);
	if (!$db){
		print "<h1>Unable to Connect to MySQLi</h1>";
		exit;
	}
	return $db;
}
function logon($db, $patron, $userid, $password){
	
	$sql_statement	=	"SELECT * ";
	$sql_statement	.=	"FROM ".$patron." ";
	$sql_statement	.=	"WHERE userID = \"".$userid."\" AND password = \"".$password."\" ;";
	
	$verifyUser = selectResults($db,$sql_statement);
	$numResults = $verifyUser[0];
	
	$outputDisplay = "";
	
	if($numResults==1){
		for ($i = 1; $i<= $numResults; $i++){
		
			$lastName =  $verifyUser[$i]['lastName'];
			$firstName =  $verifyUser[$i]['firstName'];
			$email =  $verifyUser[$i]['email'];
			$city =  $verifyUser[$i]['city'];
			$birthYear =  $verifyUser[$i]['birthYear'];
			$userid =  $verifyUser[$i]['userID'];
			$password =  $verifyUser[$i]['password'];
		
			$outputDisplay .= "<h4>Successful Logon for Patron:</h4>";
			$outputDisplay .= "<p>Name: ".$firstName." ".$lastName."<br>";
			$outputDisplay .= "Email: ".$email."</p>";
		}
	}else{
		$outputDisplay .= "<p>The Username and/or Password you have entered is invalid<br>";
		$outputDisplay .= "Cannot Log You Onto the System<br>";
		$outputDisplay .= "<br>";
		$outputDisplay .= "GO BACK and TRY AGAIN.</p>";
	}

	print $outputDisplay;
	
}
function doValidation($db, $firstName,$lastName,$email,$birthYear,$city,$patron, $userid, $password){
		$yearDigit = strlen($birthYear);
		$errorFound = ''; 

	/*firstName*/
		if (empty($firstName)){
			$errorFound .= "<p>Error: you must enter a First Name</p>\n";
		}
	/*lastName*/
		if (empty($lastName)){
			$errorFound .= "<p>Error: you must enter a Last Name</p>\n";

		}
	/*email*/
		if (empty($email)){
			$errorFound .= "<p>Error: you must enter an Email</p>\n";
		}
	/*year*/
		if (empty($birthYear) || !is_numeric($birthYear) || $yearDigit != 4){
			$errorFound .= "<p>Error: you must enter a Birth Year</p>\n";
		}
	/*city*/
		if($city == "-"){
			$errorFound .= "<p>Error: you must select a City</p>\n";
		}
	/*user id*/
		if(empty($userid)){
			$errorFound .= "<p>Error: you must enter a User ID</p>\n";
		}
	/*password*/
		if(empty($password)){
			$errorFound .= "<p>Error: you must enter a Password</p>\n";
		}
	/*person already exists*/
		if (empty($firstName)||empty($lastName)||empty($userid)||empty($password)){/* No Entry Made*/}
		else{
			$sql_verifyName	=	"SELECT * ";
			$sql_verifyName .=	"FROM ".$patron." ";
			$sql_verifyName .=	"Where lastName LIKE '%".$lastName."%' AND firstName LIKE '%".$firstName."%'; ";
				$verifyPatronName = mysqli_query($db, $sql_verifyName);
			$sql_verifyUserID	=	"SELECT * ";
			$sql_verifyUserID .=	"FROM ".$patron." ";
			$sql_verifyUserID .=	"Where userID = \"".$userid."\"; ";
				$verifyUserID = mysqli_query($db, $sql_verifyUserID);
				
				if(!$verifyPatronName){/* table does not exists yet*/}
				else{
					$numPatronsName = mysqli_num_rows($verifyPatronName);
					$numUserID = mysqli_num_rows($verifyUserID);
					if ($numPatronsName == 0){/* person does not exists yet*/}
					else{
						$errorFound .= "<p>Error: ".$firstName.' '.$lastName." already exists</p>\n";
					}
					if ($numUserID == 0){/* person does not exists yet*/}
					else{
						$errorFound .= "<p>Error: ".$userid." already exists</p>\n";
					}
			}
		}
		
	return $errorFound;
}
function addPatron($db, $firstName, $lastName, $email, $birthYear, $city, $patron, $userid, $password){
		$fullName = $firstName.' '.$lastName;
			$currentYear = date('Y');
		$age = $currentYear-$birthYear;
		
		write_Patron_to_MYSQL($db, $firstName, $lastName, $email, $birthYear, $city, $patron, $userid, $password);
		
			$msg =''; //print success mesage
			$msg.=	"<p><b>Thank You for Registering!</b></p>\n";
			$msg.=	"<p>Name: $fullName</p>\n";
			$msg.=	"<p>Email: $email</p>\n";
			$msg.=	"<p>City: $city</p>\n";
			$msg.=	"<p>Section: ";
				if($age<=15){
					$msg.=	"Children";
				}else if ($age<=54){
					$msg.=	"Adult";
				}else if ($age>=55){
					$msg.=	"Senior";
				}
			$msg.=	"</p>\n";
		
	print $msg;
}
function write_Patron_to_MYSQL($db, $firstName, $lastName, $email, $birthYear, $city, $patron, $userid, $password){

		$sql_verify = "SELECT * FROM ".$patron.";";
		$verifytable = mysqli_query($db, $sql_verify);
		
		$sql_statement =	"";
		
		if (!$verifytable){ 
			$sql_statement .=	"CREATE TABLE ".$patron." ( ";
			$sql_statement .=	"patronID	int(11) primary key AUTO_INCREMENT, ";
			$sql_statement .=	"lastName	varchar(40)	not null, ";
		 	$sql_statement .=	"firstName	varchar(30)	, ";
		 	$sql_statement .=	"email	varchar(40)	, ";
	 		$sql_statement .=	"birthYear	int(4) , ";
		 	$sql_statement .=	"city	varchar(30) ,";
		 	$sql_statement .=	"userID varchar(10) UNIQUE, ";
		 	$sql_statement .=	"password varchar(10) not null ";
		 	$sql_statement .=	"); ";
		 	$makeTable = mysqli_query($db, $sql_statement);
		 	$verifytable = mysqli_query($db, $sql_verify);
		 }
		
			$numPatrons = mysqli_num_rows($verifytable);

		$sql_statement =	"INSERT INTO ".$patron."(lastName, firstName, email, birthYear, city, userID, password) VALUES("." ";
		$sql_statement .=	"\"".$lastName."\", \"".$firstName."\", \"".$email."\", ".$birthYear.", \"".$city."\", \"".$userid."\", \"".$password."\" ";
		$sql_statement .=	"); ";
		
		$addPatron = mysqli_query($db, $sql_statement);
	
		//print $sql_statement;
}
function viewPatrons($db, $patron){
	$sql_statement =	"SELECT lastName, firstName, email, city, birthYear, userID, password ";
	$sql_statement .=	"From ".$patron." ";
	$sql_statement .=	"ORDER BY lastName; ";
	
	$result = selectResults($db, $sql_statement);
	$numResults = $result[0];
	$display = "";
	
	if (!result){
		$display .= "<p style='color: red;'>MySQL No: ".mysqli_errno($db)."<br>";
		$display .= "MySQL Error: ".mysqli_error($db)."<br>";
		$display .= "<br>SQL: ".$sql_statement."<br>";
	}else{
		for ($i = 1; $i<= $numResults; $i++){
		
		$line_ctr_remainder = $i % 2;

				if ($line_ctr_remainder == 0){
					$style = "style='background-color: #FFFFCC;'";
				} else {
					$style = "style='background-color: white;'";
				}
			
			$lastName =  $result[$i]['lastName'];
			$firstName =  $result[$i]['firstName'];
			$email =  $result[$i]['email'];
			$city =  $result[$i]['city'];
			$birthYear =  $result[$i]['birthYear'];
			$userid =  $result[$i]['userID'];
			$password =  $result[$i]['password'];
			
			$display .= "<tr ".$style.">";
			$display .= "<td>".$lastName."</td>";
			$display .= "<td>".$firstName."</td>";
			$display .= "<td>".$email."</td>";
			$display .= "<td>".$city."</td>";
			$display .= "<td>".$birthYear."</td>";
			$display .= "<td>".$userid."</td>";
			$display .= "<td>".$password."</td>";
			$display .= "</tr>\n";
			
		}
	}
	
	print $display;
}
function detectServer(){
	$server = $_SERVER['SERVER_NAME'];

	$positionFound = strpos($server, 'profperry');

	if ($positionFound === false)
	{
		$server = 'localhost';
	} else {
		$server = 'Practice Area';
	}
	print "<p>SERVER: $server </p>";
}
function keyWord($db, $keyWord){
	$keyWord= trim($keyWord);
	
	$sql_statement	=	"SELECT title, type, pubdate, isbn ";
	$sql_statement .=	"FROM book ";
		if (empty($keyWord)){	}
		else{	$sql_statement .=	"Where title LIKE '%".$keyWord."%' ";}
	$sql_statement .=	";";
	
	$result = selectResults($db, $sql_statement);
	$numResults = $result[0];

	$outputDisplay = "";
	if (!$result) {
		$outputDisplay .= "<p style='color: red;'>MySQL No: ".mysqli_errno($db)."<br>";
		$outputDisplay .= "MySQL Error: ".mysqli_error($db)."<br>";
		$outputDisplay .= "<br>SQL: ".$sql_statement."<br>";
	} else if($numResults==0){
		$outputDisplay .= "<p>No Entry Matching '".$keyWord."'</p>";
	} else {
	
		for ($i=1; $i <= $numResults; $i++)
		{

			$title = $result[$i]['title'];
			$category = $result[$i]['type'];
			$pubDate = $result[$i]['pubdate'];
			$isbn = $result[$i]['isbn'];
			
			$outputDisplay .= "<p>".$i.".  ";
				$outputDisplay .= $title."<br>";
				$outputDisplay .= "Category: ".$category."<br>";
				$outputDisplay .= "Publish Date: ".$pubDate."<br>";
				$outputDisplay .= "ISBN: ".$isbn."</p>";
		}
	}
	return $outputDisplay;
	
}
function selectResults($db, $sql_statement){

	$output = "ERROR: ";
	$outputArray = array();

	$result = mysqli_query($db, $sql_statement);

	if (!$result) {
		$output .= "<p style='color: red;'>MySQL No: ".mysqli_errno($db)."<br>";
		$output .= "MySQL Error: ".mysqli_error($db)."<br>";
		$output .= "<br>SQL: ".$sql_statement."<br>";
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
function getCities($db){	
	$sql_statement =	"SELECT name"." ";
	$sql_statement .=	"FROM city"." ";
	$sql_statement .=	"ORDER BY name"." ;";
	
	$result = mysqli_query($db, $sql_statement);
	
	$outputDisplay = "";
	$myRowCount = 0;
	
	if (!$result){
		$outputDisplay .=	"<p style = 'color: red;'>MySQL No: ".mysqli_errno($db)."<br>";
		$outputDisplay .=	"MySQL Error: ".mysqli_error($db)."<br>";
		$outputDisplay .=	"<br>SQL: ".$sql_statment."<br>";
	}else{
		$outputDisplay =	"";
		$numResults = mysqli_num_rows($result);
		
		for ($i = 0; $i < $numResults ; $i++){
			$row = mysqli_fetch_array($result);
			$name = $row['name'];
			$outputDisplay .=	"<option value='".$name."'>".$name."</option>";
		}
	}
	print $outputDisplay;
}

?>
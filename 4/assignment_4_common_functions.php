<?php
function doValidation($firstName,$lastName,$email,$birthYear,$city){
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
	
	return $errorFound;
}

function addPatron($firstName,$lastName,$email,$birthYear,$city){
		$fullName = $firstName.' '.$lastName;
		$yearDigit = strlen($birthYear);
		$currentYear = date('Y');
		$age = $currentYear-$birthYear;
		$msg ='';
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

function writePatron($firstName,$lastName,$email,$birthYear,$city){			/* write to file - patrons */
		$filename = "data/"."patrons.txt";
		$fp = fopen($filename,'a');			

		$output_line = $lastName.'|'.$firstName.'|'.$email.'|'.$city.'|'.$birthYear.'|'."\n";

		fwrite($fp, $output_line);
		fclose($fp);
}

function viewPatrons(){
	$filename = 'data/'.'patrons.txt';
	/*validate patrons.txt	*/
	if (file_exists($filename)) {
			print "<h2> View Patrons</h2>";
	/*build table*/
			$display = "";
			$line_ctr = 0;
			$fp = fopen($filename, 'r');   //opens the file for reading

		while(true){
			$line = fgets($fp);
				if (feof($fp)){
					break;
				}

			$line_ctr++;

			$line_ctr_remainder = $line_ctr % 2;

				if ($line_ctr_remainder == 0){
					$style = "style='background-color: #FFFFCC;'";
				} else {
					$style = "style='background-color: white;'";
				}

			list($lastname, $firstname, $email, $city, $birthYear) = explode('|', $line);

				$display .= "<tr ".$style.">";
				$display .= "<td>".$lastname."</td>";
				$display .= "<td>".$firstname."</td>";
				$display .= "<td>".$email."</td>";
				$display .= "<td>".$city."</td>";
				$display .= "<td>".$birthYear."</td>";
				$display .= "</tr>\n";
		}

		fclose($fp );
		
	} else {
		print "The file $filename does not exist";
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

function keyWord($keyWord){
$fileBookList= "data/booklist.txt";
	
	$linesInFile = count(file($fileBookList));
	
	$fp = fopen($fileBookList,'r');
	
	$ii = 1;
	$keyWord= trim($keyWord);
	$keyWordFound = '';
		
	if(empty($keyWord)){
		while(true){
			$line = fgets($fp);
				
				if (feof($fp)){
					break;
				}
				
			$bookFormated = list($title, $category, $pubDate, $ISBN) = explode('*', $line);
				$keyWordFound .= "<p>".$ii.".  ";
				$keyWordFound .= $title."<br>";
				$keyWordFound .= "Category: ".$category."<br>";
				$keyWordFound .= "Publish Date: ".$pubDate."<br>";
				$keyWordFound .= "ISBN: ".$ISBN."</p>";
				$ii++;
			}
	}
	else{
		while(true){
			$line = fgets($fp);
				
				if (feof($fp)){
					break;
				}
				
			$bookFormated = list($title, $category, $pubDate, $ISBN) = explode('*', $line);
			$pos = stripos($title,$keyWord);
			 if ($pos!==false){
				$keyWordFound .= "<p>".$ii.".  ";
				$keyWordFound .= $title."<br>";
				$keyWordFound .= "Category: ".$category."<br>";
				$keyWordFound .= "Publish Date: ".$pubDate."<br>";
				$keyWordFound .= "ISBN: ".$ISBN."</p>";
				
			}
			$ii++;
		}
	}

		fclose($fp);
		return $keyWordFound;
	
}

?>
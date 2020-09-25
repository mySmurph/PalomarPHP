 <!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/KingLib_3.css">
</head>

<body>

<header>
	<a href="assignment_3_register.php"><img src="images/KingLibLogo.jpg"></a>
</header>

<main>

<div class="info">
	
	<table border = '1'>
		<tr>
			<th>Last Name</th>
			<th>First Name</th>
			<th>Email</th>
			<th>City</th>
			<th>Birth Year</th>
		</tr>
		
	<?php
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

				$display .= "<tr $style>";
				$display .= "<td>".$lastname."</td>";
				$display .= "<td>".$firstname."</td>";
				$display .= "<td>".$email."</td>";
				$display .= "<td>".$city."</td>";
				$display .= "<td>".$birthYear."</td>";
				$display .= "</tr>\n";
		}

		fclose($fp );

		print $display;   //This prints the table rows
		
		} else {
			print "The file $filename does not exist";
		}
	?>
	</table>
</div>
</main>

</body>
</html>
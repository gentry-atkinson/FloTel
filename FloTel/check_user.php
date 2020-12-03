<!DOCTYPE php>
<html lang="en-US">
<head>
<meta charset="utf-8"/>
<title>FloTel</title>
</head>
<body style="background-color: #E9E9EF">

	<?php

    class Doc{
        public $value = "";
        public $score = 0.0;
    }




		$formdata = array(
				'username'=> ($_GET['username']),
				'password'=> ($_GET['password'])
			);
		echo "<img src=\"imgs/banner.png\" />";
		$name = explode(',', $formdata['username']);
                foreach ($name as &$c){
                    $c = strtoupper(trim($c, " "));
                }
		//print_r($cities);

		$filename = "USERS.csv";
		$inFile = fopen( $filename, "r");
		$pool = array();
		$pass = "";
		while(! feof($inFile)) {
			$candidate = fgets($inFile);
			$ca = explode(',', $candidate);
			$candidateName = explode(',', $candidate)[0];
			$candidatePass = explode(',', $candidate)[1];
			//print_r($candidateName . $candidatePass . "\n");
			if (in_array(strtoupper(trim($candidateName, " ")), $name)){
					$pass = $candidatePass;
					break;
      }
		}

    echo "<br />";
    //print_r($queryTokens);
    echo "<br />";

		if(strcmp(trim($formdata['password'], " "), trim($pass, " "))==0){
			echo "Name: " . $ca[2] . " " . $ca[4] . " <br />";
			echo "Email: " . $ca[6] . " <br />";
			echo "Credit Card: " .  $ca[5] . " <br />";
			echo "Total Miles: 123,000 <br />";
			echo "<a href=\"index.html\"><button type=\"button\">Confirm Information</button></a>";
			echo "<a href=\"update_user.html\"><button type=\"button\">Update Information</button></a>";
		}
		else{
			//echo "Bad, expected " . $pass . " got " . $formdata['password'];
			echo "Unrecognized username and password pair";
			echo "<a href=\"logIn.html\"><button type=\"button\">Try Again</button></a>";
		}



    fclose( $inFile );

	?>

</body>
</html>

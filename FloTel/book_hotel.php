<!DOCTYPE php>
<html lang="en-US">
<head>
<meta charset="utf-8"/>
<title>FloTel</title>
</head>
<body style="background-color: #E9E9EF">

	<?php

		$formdata = array(
				'num_people' => $_GET['num_people'],
				'check_in' => $_GET['check_in'],
				'check_out' => $_GET['check_out'],
				'price' => $_GET['price']
			);
		//print_r($cities);

		$filename = "BOOKED_HOTELS.csv";
		if($formdata['num_people'] >1) $np = $formdata['num_people'];
		else $np = 1;
		//$outFile = fopen( $filename, "w+");
		echo "<img src=\"imgs/blue_red_logo.png\" />";
		echo "<h1>Hotel Booked</h1>";
		echo "<h4>Save this receipt for your records</h4>";

		$d1 = date_create($formdata['check_in']);
	 	$d2 = date_create($formdata['check_out']);
		$days = date_diff($d1, $d2);

    echo "<table cellpadding=\"5\" cellspacing=\"5\" align=\"left\" width=\"20%\" border=\"1\">";
    echo "<tr>";
    echo "<td>Guests</td>";
		echo "<td>". $np . "</td>";
    echo "</tr>";
		echo "<tr>";
    echo "<td>Check In:</td>";
		echo "<td>" . $formdata['check_in'] . "</td>";
    echo "</tr>";
		echo "<tr>";
    echo "<td>Check Out:</td>";
		echo "<td>" . $formdata['check_out'] . "</td>";
    echo "</tr>";
		echo "<tr>";
    echo "<td>Total Days:</td>";
		echo "<td>" . $days->format('%d') . "</td>";
    echo "</tr>";
		echo "<tr>";
		echo "<tr>";
    echo "<td>Nightly Price:</td>";
		echo "<td>" . $formdata['price'] . "</td>";
    echo "</tr>";
		echo "<tr>";
    echo "<td>Confirmation Number:</td>";
		echo "<td>" . "1z398q7fg9e" . "</td>";
    echo "</tr>";
    echo "</table>";

		$candidateArray = array();
    echo "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
		echo "<a href=\"index.html\"><button type=\"button\">Charge My Card</button></a>";
		echo "<br /><br /><hr /><br /><br />";
		echo "<center><a href=\"index.html\"><img src=\"imgs/blue_logo.png\" /></a></center>";

    //fclose( $outFile );

	?>

</body>
</html>

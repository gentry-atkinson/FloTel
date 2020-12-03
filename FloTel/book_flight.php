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
				'depart' => $_GET['depart'],
				'price' => $_GET['price'],
				'price' => $_GET['price'],
				'fnumber' => $_GET['fnumber']
			);
		//print_r($cities);

		$filename = "BOOKED_FLIGHTS.csv";
		if($formdata['num_people'] >1) $np = $formdata['num_people'];
		else $np = 1;
		//$outFile = fopen( $filename, "w+");
		echo "<h1>Hotel Booked</h1>";

		//$d1 = date_create($formdata['check_in']);
	 	//$d2 = date_create($formdata['check_out']);
		//$days = date_diff($d1, $d2);

    echo "<table cellpadding=\"5\" cellspacing=\"5\" align=\"left\" width=\"20%\" border=\"1\">";
    echo "<tr>";
    echo "<td>Travelers</td>";
		echo "<td>". $np . "</td>";
    echo "</tr>";
		echo "<tr>";
    echo "<td>Depart:</td>";
		echo "<td>" . $formdata['depart'] . "</td>";
    echo "</tr>";
		echo "<tr>";
		echo "<tr>";
    echo "<td>Price Per Traveler:</td>";
		echo "<td>" . $formdata['price'] . "</td>";
    echo "</tr>";
		echo "<tr>";
    echo "<td>Flight Number:</td>";
		echo "<td>" . $formdata['fnumber'] . "</td>";
    echo "</tr>";
		echo "<tr>";
    echo "<td>Confirmation Number:</td>";
		echo "<td>" . "1z398q7fg9e" . "</td>";
    echo "</tr>";
    echo "</table>";

		$candidateArray = array();
    echo "<br /><br /><br /><br /><br /><br /><br /><br />";
		echo "<a href=\"index.html\"><button type=\"button\">Home</button></a>";

    //fclose( $outFile );

	?>

</body>
</html>

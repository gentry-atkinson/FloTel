<!DOCTYPE php>
<html lang="en-US">
<head>
<meta charset="utf-8"/>
<title>FloTel</title>
</head>
<body style="background-color: #E9E9EF">

	<?php
    function printValue($doc, $num_people){
        $valueArray = explode(',', $doc);
        echo "<tr> ";
        echo "<td> " . $valueArray[0] . " </td>";
        echo "<td> " . $valueArray[1] . " </td>";
        echo "<td> " . $valueArray[2] . " </td>";
        echo "<td> " . $valueArray[3] . " </td>";
				echo "<td> " . $valueArray[4] . " </td>";
        echo "<td> " . $valueArray[5] . " </td>";
				echo "<td>
					<form action=\"./book_flight.php\" method=\"get\">
					<input type=hidden name=\"num_people\" value=$num_people>
					<input type=hidden name=\"depart\" value=" . $valueArray[2] . ">" .
					"<input type=hidden name=\"price\" value=" . $valueArray[4] . ">" .
					"<input type=hidden name=\"fnumber\" value=" . $valueArray[6] . ">" .
					"<input type=\"submit\" value=\"Book\">
					</td>";
        echo "</tr>";
    }

    class Doc{
        public $value = "";
        public $score = 0.0;
    }

    function generateCandidateList($tokenArray, &$candidateArray){
        for ($i = 0; $i < count($tokenArray); ++$i){
            $i_strings = explode(' ',  $tokenArray[$i]);
						foreach ($i_strings as $i_string){
							if (!in_array($i_string, $candidateArray)){
								array_push($candidateArray, $i_string);
							}
						}
        }
    }

		function removeCandidates(&$candidateArray, $allTokensArray){
			$min_sup = 0.01;
			$totalCount = 0;
			$itemCounts = array();
			$newArray = array();
			$itemCounts = array_fill_keys($candidateArray, 0);
			if (count($candidateArray) > 0){
				$oldCandidateArray = $candidateArray;
			}
			foreach($candidateArray as $canString){
				$canArray = explode(' ', $canString);
				foreach($allTokensArray as $tokenArray){
					if(array_intersect($canArray, $tokenArray) === $canArray){
						$itemCounts[$canString] += 1;
						//print_r($canString);
						//echo "<br />";
					}
					$totalCount += 1;
				}
			}
			foreach ($candidateArray as $candidate) {
				//print_r($candidate);
				if ($itemCounts[$candidate]/$totalCount > $min_sup){
					array_push($newArray, $candidate);
				}
			}
			//print_r ($oldCandidateArray);
			$candidateArray = $newArray;
		}

		function updateCandidates(&$candidateArray, &$oldCandidateArray){
			$newArray = array();
			for ($i = 0; $i < count($candidateArray); ++$i){
					$i_string = explode(' ',  $candidateArray[$i]);
					for ($j = $i+1; $j < count ($candidateArray); ++$j){
							$j_string = explode(' ', $candidateArray[$j]);
							if (count($j_string) == 0) continue;
							$intersect = array_intersect($i_string, $j_string);
							if(count($i_string) - count($intersect) == 1){
									//print_r(array_combine($i_string, $j_string));
									$newCandidate =  array_merge($i_string, $j_string);
									array_push($newArray, implode(" ", array_unique($newCandidate)));
								}
					}
			}
			if (count($candidateArray) > 0)
				$oldCandidateArray = $candidateArray;
			$candidateArray= $newArray;
		}


		$formdata = array(
				'origin'=> ($_GET['origin']),
				'destination' => $_GET['destination'],
				'num_people' => $_GET['num_people'],
				'dep_date' => $_GET['dep_date']
			);
		if($formdata['num_people'] >1){
			echo "<h1>Your best flight from " . $formdata['origin'] . " for " . $formdata['num_people'] . " people</h1>";
		}
		else{
			echo "<h1>Your best flight from " . $formdata['origin'] . " for 1 person</h1>";
		}
		$cities = explode(',', $formdata['origin']);
                foreach ($cities as &$c){
                    $c = strtoupper(trim($c, " "));
                }
		//print_r($cities);

		$filename = "FLIGHTS.csv";
		$inFile = fopen( $filename, "r");
		$pool = array();

		while(! feof($inFile)) {
			$candidate = fgets($inFile);
			$candidateLocation = explode(',', $candidate)[0];
			//print_r($candidateLocation . "\n");
			if (in_array(strtoupper(trim($candidateLocation, " ")), $cities)){
          array_push($pool, $candidate);
      }
		}
                $value = 'value';
                $score = 'score';

                $queryTokens = array();
                //tokenize($queryTokens, $formdata['station_type']);

                //print_r($formdata['station_type']);
                echo "<br />";
                //print_r($queryTokens);
                echo "<br />";

                echo "<table cellpadding=\"5\" cellspacing=\"5\" align=\"left\" width=\"100%\" border=\"1\">";
                    echo "<tr>";
                    echo "<th>Origin</td>";
                    echo "<th>Destination</td>";
                    echo "<th>Date</td>";
                    echo "<th>Time</td>";
										echo "<th>Price</td>";
										echo "<th>Airline</td>";
										echo "<th>Book This Flight</td>";
                    echo "</tr>";
                    foreach ($pool as $p) {
                        printValue($p, $formdata['num_people']);
                    }
                echo "</table>";

								$candidateArray = array();
                echo "<br /><br /><br /><br /><br /><br /><br /><br />";
								echo "<br /><br /><hr /><br /><br />";
								echo "<center><a href=\"index.html\"><img src=\"imgs/blue_logo.png\" /></a></center>";

                fclose( $inFile );

	?>

</body>
</html>

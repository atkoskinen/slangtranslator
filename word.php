<?php

if ($_GET['word'] == "") {
	die();
}
$json       = file_get_contents("slangi.json");
$dictionary = json_decode($json, true);

$answer = $dictionary[strtolower($_GET['word'])];

echo "<link rel=\"stylesheet\" href=\"bootstrap/css/bootstrap.css\">";
echo "<style type=\"text/css\">
 <!-- BODY {background:none transparent;}-->
 </style>";
echo "<center><h2><font color=\"#FFFFF\">";

if ($answer == "") {
	$reversedDictionary = array_flip($dictionary);
	$answerReversed = $reversedDictionary[strtolower($_GET['word'])];
	
	if ($answerReversed != "") {
		echo "$answerReversed</font></h2></center>";
		die();
	}
	$word = $_GET['word'];
	echo "Sanalle <i>$word</i> ei ole käännöstä.</font></center>";
	die();
}
echo "$answer</h2></font></center>";

?>
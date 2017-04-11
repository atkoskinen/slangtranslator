<?php
$word = $_GET['word'];
//$word = mb_strtolower($word);
$word = strip_tags($word);

if ($word == "") {
    die();
}

$json       = file_get_contents("slangi.json");
$dictionary = json_decode($json, true);
$answers    = array_keys($dictionary, $word);
$count      = count($answers);


echo "<link rel=\"stylesheet\" href=\"bootstrap/css/bootstrap.css\">";
echo "<style type=\"text/css\">
 <!-- BODY {background:none transparent;}-->
 </style>";
echo "<center><h2><font color=\"#FFFFF\">";

if ($count == 0) {
    $reversedDictionary = array_flip($dictionary);
    $answers            = array_keys($reversedDictionary, $word);
    $count              = count($answers);
    
}
if ($count == 0) {
    echo "Ei hakutuloksia haulle \"$word\".";
    die();
}
echo "$count sana(a) löytyi haulle $word:<br>";
foreach ($answers as &$value) {
    echo "$value<br>";
}
?>
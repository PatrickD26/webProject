
<?php
session_start();

$file = file_get_contents('liste_serie.json');

$jsons = json_decode($file, true);

$_SESSION["json"]=$jsons;

print_r($jsons);

foreach($jsons['serie'] as $json){
    echo "<img src=". $json["image"].">";
}        
?>

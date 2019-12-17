
<?php

$file = file_get_contents('C:/Users/natha/Documents/Cesi/Cours/php/liste_serie.json');

$jsons = json_decode($file, true);

print_r($jsons);

foreach($jsons['serie'] as $json){
    echo "<img src=". $json["image"].">";
}        
?>

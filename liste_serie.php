
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$file = file_get_contents('liste_serie.json');

$jsons = json_decode($file, true);

$_SESSION["shows_json"] = $jsons;
    
foreach($_SESSION["shows_json"] as $value)
{
    if ($value['favoris'] == 1){

        $_SESSION["shows_favorites_json"][] = $value;

    } else if ($value['favoris'] == 0) {

        $_SESSION["shows_json"][] = $value;

    
}


?>

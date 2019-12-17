
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Chargement des données du json
// filtre par favoris
function getListeSeries() {
    $file = file_get_contents('liste_serie.json');

    $jsons = json_decode($file, true);
    
    $_SESSION["shows_all"] = $jsons;
    $_SESSION["shows_favorites_json"] = [];
    $_SESSION["shows_json"] = [];

    foreach($jsons as $value)
    {
        if ($value['favoris'] == 1){
    
           array_push($_SESSION["shows_favorites_json"], $value);
    
        } else if ($value['favoris'] == 0) {
    
            array_push($_SESSION["shows_json"], $value);
        }
    }
}
?>

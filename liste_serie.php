
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

function getSerieByType($id, $type) {
    $_SESSION["shows_type"] = [];
    $file = file_get_contents('liste_serie.json');

    $jsons = json_decode($file, true);

    foreach($jsons as $value)
    {
        if ($value['type'] == $type AND $value["id"] != $id){
    
           array_push($_SESSION["shows_type"], $value);
    
        }
    }
};
?>
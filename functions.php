<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function updateFavorites($title) {
    
    foreach($_SESSION["shows_json"] as $key => $value)
    {
        if($title == $value["titre"])
        {
            $value["favoris"] == 1 ? $_SESSION["shows_json"][$key]["favoris"] = 0 : $_SESSION["shows_json"][$key]["favoris"] = 1;
        }
    }

    file_put_contents('liste_serie.json', json_encode($_SESSION["shows_json"]));
}
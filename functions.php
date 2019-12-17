<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once("liste_serie.php");

function updateFavorites($id) {
    
    foreach($_SESSION["shows_json"] as $key => $value)
    {
        if($id == $value["id"])
        {
            $value["favoris"] == 1 ? $_SESSION["shows_json"][$key]["favoris"] = 0 : $_SESSION["shows_json"][$key]["favoris"] = 1;
        }
    }

    file_put_contents('liste_serie.json', json_encode($_SESSION["shows_json"]));

}

function updateNoteSerie($id, $note) {
    foreach($_SESSION["shows_json"] as $key => $value)
    {
        if($id == $value["id"])
        {
            $_SESSION["shows_json"][$key]["note"] = $note;
        }
    }

    file_put_contents('liste_serie.json', json_encode($_SESSION["shows_json"]));

}


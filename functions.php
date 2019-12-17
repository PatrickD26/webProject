<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once("liste_serie.php");


// Ajouter/Retirer une serie des favoris
function updateFavorites($id) {
    
    foreach($_SESSION["shows_all"] as $key => $value)
    {
        if($id == $value["id"])
        {
            $value["favoris"] == 1 ? $_SESSION["shows_all"][$key]["favoris"] = 0 : $_SESSION["shows_all"][$key]["favoris"] = 1;
        }
    }

    file_put_contents('liste_serie.json', json_encode($_SESSION["shows_all"]));

    getListeSeries();
}

// Mise à jour de la note d'une serie
function updateNoteSerie($id, $note) {
    foreach($_SESSION["shows_all"] as $key => $value)
    {
        if($id == $value["id"])
        {
            $_SESSION["shows_all"][$key]["note"] = $note;
        }
    }

    file_put_contents('liste_serie.json', json_encode($_SESSION["shows_all"]));

    getListeSeries();
}


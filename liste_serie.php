
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function getListeSeries() {
    $file = file_get_contents('liste_serie.json');

    $jsons = json_decode($file, true);
    $_SESSION["shows_json"]=$jsons;

}


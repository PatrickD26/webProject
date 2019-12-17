<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require("liste_serie.php");
require("functions.php");

$serie = [];
$id = $_GET["id"];


foreach ($_SESSION["shows_all"] as $all) {
    if ($all["id"] == $id) {
        $serie = $all;
    }
}

getSerieByType($id , $serie["type"]);

?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Detail</title>
        <link rel="stylesheet" href="details.css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
    <header>
        <div class="headerDesktop">
            <div class="firstColumn">
                <div class="logo">
                    <div class="logoLabel">Logo</div>
                </div>
                <div class="desktopTitle">Liste des séries</div>
            </div>
            <div class="secondColumn">
                <?php include_once('header_link.php'); ?>
            </div>
        </div>
        <div class="mobileHeader">
            <div class="logo">
                <div class="logoLabel">Logo</div>
            </div>
            <div class="burger">
                <i class="material-icons" style="font-size:-webkit-xxx-large">
                    menu
                </i>
            </div>
        </div>
    </header>
    <div>
        <table class="detail">
            <tr>
                <form method="post">
                    <?php
                    if($serie['favoris'] === 0):  ?>
                        <button type="submit" name="addFav" value="envoyer">Ajouter un favori</button>
                    <?php
                    elseif ($serie['favoris'] === 1): ?>
                        <button type="submit" name="addFav" value="envoyer">Enlever un favori</button>
                    <?php endif ?>
                    <br>
                    <label for="note">Ajouter une note : </label>
                    <input type="number" name="note" min="0" max="5" placeholder="<?php echo $serie["note"] . "/5"?>">
                    <button type="submit" name="noter" value="valider">Valider la note</button>

                </form>
            </tr>

            <div class="showTitle">
                <div><img src="<?php echo $serie['imgDetail']; ?>" alt=""></div>
                <div><h3><?php echo $serie['titre']; ?></h3></div>
            </div>
            <tr>type: <?php echo $serie['type']; ?></tr>
            <br><br>
            <tr><?php echo $serie['resume']; ?></tr>
            <tr <?php foreach ($serie['episodes'] as $saison){ ?>>
                <ul>
                    <li><?php echo $saison["saison"] ?>
                        <ul>
                            <?php foreach ($saison['episodes'] as $episode) { ?>
                                <li>
                                    <?php echo $episode; ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
                <?php }; ?>
            </tr>


        </table>

    <h3>Séries du même type</h3>

    <table>
    <div class="desktopTable">
        <?php
             foreach ($_SESSION["shows_type"] as $value):
        ?>
            <div class="showDescription" onclick="window.location='detail_serie.php?id=<?php echo $value['id'] ?>'">
                <img src="<?php echo $value['img']; ?>" alt="<?php $value['titre'] ?>"></>
                <div class="showLabel"><?php echo $value['titre'] ?></div>
            </div>
    <?php endforeach; ?>
    </div>
    </table>

    </div>
    </body>
    </html>


<?php
if (isset($_POST['addFav']) AND $_POST['addFav']=='envoyer') {
    updateFavorites($id);
}
if (isset($_POST['noter']) AND isset($_POST['note']) AND  $_POST['noter']=='valider') {
    updateNoteSerie($id, $_POST['note']);
}
?>
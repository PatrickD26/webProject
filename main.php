<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    session_start();
    //récupération de la liste des séries
    require("liste_serie.php");

    getListeSeries();
    ?>
    <link rel="stylesheet" href="main.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Series</title>
</head>
<body>
<table>
    <header>
        <div class="headerDesktop">
            <div class="firstColumn">
                <div class="logo">
                    <div class="logoLabel">Logo</div>
                </div>
                <div class="title">
                    Mes Favoris
                </div>
            </div>
            <div class="secondColumn">
                Mes favoris | Consulter la liste des séries |
            </div>
        </div>
        <div class="mobileHeader">
            <div class="firstRow">
                <div class="logo">
                    <div class="logoLabel">Logo</div>
                </div>
                <div class="burger">
                    <i class="material-icons" style="font-size:-webkit-xxx-large">
                        menu
                    </i>
                </div>
            </div>
            <div class="secondRow">
                Mes favoris
            </div>
        </div>
    </header>
    <?php
    foreach ($_SESSION["shows_json"] as $value):
        ?>
        <tr class="showDescription">
            <td><img src="<?php echo $value['img']; ?>" alt=""></td>
            <td class="showLabel"><?php echo $value['titre']; ?></td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>

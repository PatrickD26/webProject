<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    session_start();
    //récupération de la liste des séries
    include_once("liste_serie.php");

    getListeSeries();
    ?>
    <link rel="stylesheet" href="main.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Series</title>
</head>
<body>
<table>
    <header>
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
        <tr>
            <td><img src="<?php  ?>" alt=""></td>
            <td><?php printf($value['titre']); ?></td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>

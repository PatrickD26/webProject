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
    <link rel="stylesheet" href="show_list.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Series</title>
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
            Mes favoris | Consulter la liste des séries |
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
<div class="tables">
    <div class="mobileTitle">
        Liste des séries
    </div>
    <table class="mobileTable">
        <?php
        foreach ($_SESSION["shows_json"] as $value):
            ?>
            <tr class="showDescriptionMobile">
                <td><?php echo $value['titre']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="desktopTable">
        <?php
             foreach ($_SESSION["shows_json"] as $value):
        ?>
            <div class="showDescriptionDesktop" onclick="window.location='detail_serie.php?id=<?php echo $value['id'] ?>'">
                <img src="<?php echo $value['img']; ?>" alt="<?php $value['titre'] ?>"></>
                <div class="showLabel"><?php echo $value['titre']; ?></div>
            </div>
    <?php endforeach; ?>
    </div>
</div>

</body>
</html>

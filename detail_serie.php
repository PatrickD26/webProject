<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require("liste_serie.php");
require("functions.php");

$serie = [];
$id = $_GET["id"];


foreach($_SESSION["shows_all"] as $all)
{
    if($all["id"] == $id ){
        $serie = $all;
    }
}


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
<div>
    <table class="detail">
     
        <form method="post">
            <input type="submit" name="addFav" value="⭐">
            <input type="number" name="note" min="0" max="5" placeholder="<?php echo $serie["note"]?>">
        <form>
            <td rowspan="2"><img src="<?php echo $serie['imgDetail']; ?>" alt=""></td>
        </tr>
        <tr>
            <td>
                <tr><h3><?php echo $serie['titre']; ?></h3></tr>
                <tr>type: <?php echo $serie['type']; ?></tr><br><br>
                <tr><?php echo $serie['resume']; ?></tr>
            </td>
            <td <?php foreach($serie['episodes'] as $saison){?>>
                <ul>
                    <li><?php echo $saison["saison"] ?>
                        <ul>
                        <?php foreach($saison['episodes'] as $episode) {?>
                            <li>
                                <?php echo $episode; ?>
                                </li>
                        <?php }?>
                        </ul>
                    </li>
                </ul>
            <?php }; ?>  
            </td>
        </tr>

       
    </table>
</div>
</body>
</html>


<?php
 if (isset($_POST['addFav'])) {
    updateFavorites($id);
 }
 if (isset($_POST['note'])) {
    updateNoteSerie($id, $_POST['note']);
 }
?>
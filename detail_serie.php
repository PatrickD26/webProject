<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require("liste_serie.php");

$serie = [];
$id = $_GET["id"];

foreach($_SESSION["shows_all"] as $all)
{
    if($all["id"] == $id){
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
</head>
<body>
<table>
    <tr>
        <td><img src="<?php echo $serie['imgDetail']; ?>" alt=""></td>
        <td>
            <tr><h3><?php echo $serie['titre']; ?></h3></tr>
            <tr><?php echo $serie['type']; ?></tr>
            <tr><?php echo $serie['resume']; ?></tr>
        </td>
        <td>
            <ul>
                <li></li>
            </ul>
            
        </td>
    </tr>
</table>
    
</body>
</html>
<?php
require_once ('Outils/glofunction.php');
session_start();
$pseudo = $_SESSION['pseudo'];
$lien_image = $_SESSION['lien_image'];
$groupid = $_SESSION['groupid'];
?>

<!DOCTYPE html>
<html>
<head>

    <title>Myns Website 1.0</title>
    <meta charset="utf-8">

</head>

<body>

<?php
$idinfo = $_GET["idinfo"];

echo '<h2>'.$idinfo.'</h2>'; ?>

</body>

</html>

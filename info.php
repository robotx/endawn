<?php
require_once ('Outils/glofunction.php');
session_start();
$pseudo = $_SESSION['pseudo'];
$lien_image = $_SESSION['lien_image'];
$groupid = $_SESSION['groupid'];
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="Style/normalize.css" />
    <link rel="stylesheet" href="Style/style.css" />
    <link rel="stylesheet" href="Style/insform.css" />
    <link rel="stylesheet" href="Style/info.css" />
</head>
<body>
<div id="topbar">
    <a href="index.php"><h1 class="maintitle">Endawn</h1></a>
    <?php if(!isset($_SESSION['id'])) echo '<a href="#" onclick="document.getElementById(\'idconnexion\').style.display=\'block\'"><h3 id="connect" class="title">Connexion</h3></a>
    <a href="#" onclick="document.getElementById(\'idinscription\').style.display=\'block\'"><h3 id="inscription" class="title">Inscription</h3></a>'?>
</div>

<div class="sidebar card animate-left" style="display:none" id="mySidebar">
    <a href="#"><div class="button1" id="adminproj"><h3 id="adminbtntitle" class="title">Administration du projet</h3></div></a>
    <a href="#"><div class="button1" id="News"><h3 class="title">News</h3></div></a>
    <a href="#"><div class="button1" id="Forum"><h3 class="title">Forum</h3></div></a>
    <a href="#"><div class="button1" id="Revue"><h3 class="title">Revue</h3></div></a>
    <a href="#"><div class="button1" id="Timeline"><h3 class="title">Timeline</h3></div></a>
    <a href="#"><div class="button1" id="adminsite"><h3 id="adminbtntitle" class="title">Administration du site</h3></div></a>

    <img id="closeNav" onclick="w3_close()" width="50" height="50" src="Style/img/leftarrow.svg" />
</div>

<div id="main">

    <img id="openNav" onclick="w3_open()" width="50" height="50" src="Style/img/rightarrow.svg" />

<?php
$idinfo = $_GET["idinfo"];
?>
    <h2 class="maininfo"><?php echo $idinfo; ?></h2>

</body>
<script src="Js/Style.js"></script>
<script src="Js/Connexion.js"></script>
</html>

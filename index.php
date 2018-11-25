<?php
require('Traitement/bdd/Connect.php')
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="Style/normalize.css" />
    <link rel="stylesheet" href="Style/style.css" />
</head>
<body>
<div id="topbar"></div>
<h1 class="maintitle">Endawn</h1>
<a href="connexion.php"><h3 id="connect" class="title">Connexion</h3></a>
<a href="inscriptionform.php"><h3 id="inscription" class="title">Inscription</h3></a>

<div class="sidebar card animate-left" style="display:none" id="mySidebar">
    <div class="button1" id="adminproj"><a href="#"><h3 class="title">Administration du projet</h3></a></div>
    <div class="button1" id="News"><a href="#"><h3 class="title">News</h3></a></div>
    <div class="button1" id="Forum"><a href="#"><h3 class="title">Forum</h3></a></div>
    <div class="button1" id="Revue"><a href="#"><h3 class="title">Revue</h3></a></div>
    <div class="button1" id="adminsite"><a href="#"><h3 class="title">Administration du site</h3></a></div>

    <img id="closeNav" onclick="w3_close()" width="50" height="50" src="Style/leftarrow.svg" />
</div>

<div id="main">

    <img id="openNav" onclick="w3_open()" width="50" height="50" src="Style/rightarrow.svg" />


</body>
<script  src="Js/Style.js"></script>

</html>


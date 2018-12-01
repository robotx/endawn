<?php
require('Traitement/bdd/Connect.php');

session_start();
$pseudo = $_SESSION['pseudo'];
$avatar = $_SESSION['avatar'];
$groupid = $_SESSION['groupid'];

$tokenins = md5(uniqid(rand(), TRUE));
$_SESSION['tokenins'] = $tokenins;
$_SESSION['token_timeins'] = time();

$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;
$_SESSION['token_time'] = time();
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="Style/normalize.css" />
    <link rel="stylesheet" href="Style/style.css" />
    <link rel="stylesheet" href="Style/insform.css" />
</head>
<body>
<div id="topbar">
    <a href="testform.php"><h1 class="maintitle">Endawn</h1></a>
    <?php if(!isset($_SESSION['id'])) echo '<a href="#" onclick="document.getElementById(\'idconnexion\').style.display=\'block\'"><h3 id="connect" class="title">Connexion</h3></a>
<a href="#" onclick="document.getElementById(\'idinscription\').style.display=\'block\'"><h3 id="inscription" class="title">Inscription</h3></a>'?>
</div>

<div class="sidebar card animate-left" style="display:none" id="mySidebar">
    <?php
    if(isset($_SESSION['pseudo']) && !is_null($_SESSION['pseudo'])){
        echo "<img class='avatar' src='Style/img/upload/" + $avatar + "' />
    <h2 class='avatarname'>Bonjour, " + $pseudo +"</h2>"; } else echo "<br/><br/><br/>"?>
    <a href="#"><div class="button1" id="adminproj"><h3 id="adminbtntitle" class="title">Administration du projet</h3></div></a>
    <a href="#"><div class="button1" id="News"><h3 class="title">News</h3></div></a>
    <a href="#"><div class="button1" id="Forum"><h3 class="title">Forum</h3></div></a>
    <a href="#"><div class="button1" id="Revue"><h3 class="title">Revue</h3></div></a>
    <a href="#"><div class="button1" id="Timeline"><h3 class="title">Timeline</h3></div></a>
    <a href="#"><div class="button1" id="adminsite"><h3 id="adminbtntitle" class="title">Administration du site</h3></div></a>
    <a href="Traitement/logout.php"><img id="logout" src="Style/img/logout.svg" width="50" height="50" /></a>
    <img id="closeNav" onclick="w3_close()" width="50" height="50" src="Style/img/leftarrow.svg" />
</div>

<div id="main">

    <img id="openNav" onclick="w3_open()" width="50" height="50" src="Style/img/rightarrow.svg" />

    <div id="idinscription" class="modal">
        <span onclick="document.getElementById('idinscription').style.display='none'" class="close" title="Close Modal">&times;</span>

        <form id="forminscription" method="post" action="test.php" enctype="multipart/form-data">
            <h2 id="formtitle">Inscription</h2>
                <!-- On limite le fichier à 100Ko -->
                <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                <input type="file" name="avatar">
            <button type="submit" id="submit" class="btn">Valider</button>
            </div>

        </form>
    </div>


    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////!--

</body>
<script src="Js/Style.js"></script>
<script src="Js/Connexion.js"></script>

</html>


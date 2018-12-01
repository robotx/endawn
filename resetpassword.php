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

$mfr = $_GET["mfr"];
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
    <a href="index.php"><h1 class="maintitle">Endawn</h1></a>
</div>

<div class="sidebar card animate-left" style="display:none" id="mySidebar">
    <?php
    if(!isset($_SESSION['id']) && !is_null($_SESSION['pseudo'])) { echo "<img class='avatar' src='.$avatar.'/>
    <h2 class='avatarname'>Bonjour, " . $pseudo ."</h2>"; } else echo "<br/><br/><br/>"?>
    <a href="#"><div class="button1" id="adminproj"><h3 id="adminbtntitle" class="title">Administration du projet</h3></div></a>
    <a href="#"><div class="button1" id="News"><h3 class="title">News</h3></div></a>
    <a href="#"><div class="button1" id="Forum"><h3 class="title">Forum</h3></div></a>
    <a href="#"><div class="button1" id="Revue"><h3 class="title">Revue</h3></div></a>
    <a href="#"><div class="button1" id="Timeline"><h3 class="title">Timeline</h3></div></a>
    <a href="#"><div class="button1" id="adminsite"><h3 id="adminbtntitle" class="title">Administration du site</h3></div></a>
    <a href="Traitement/logout.php"><img id="logout" width="70" height="70" src="Style/img/logout.svg" /></a>
    <img id="closeNav" onclick="w3_close()" width="50" height="50" src="Style/img/leftarrow.svg" />
</div>

<div id="main">

    <img id="openNav" onclick="w3_open()" width="50" height="50" src="Style/img/rightarrow.svg" />

    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////!-->

    <div id="idreset" class="modalresetmdp">
        <form class="formreset" method="post" action="Traitement/Gestion/resetvalidmdp.php">
            <div class="container">
                <label id="formtitleconnexion"><h1>Réinitialisation mot de passe</h1></label>
                <br>
                <div id="formtableauconnexion">
                    <input type="text" id="codereset" name="code" placeholder="Code.." required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">
                </div>
                <div id="formtableauconnexion">
                    <input type="password" id="passreset" name="pass1" placeholder="Mot de passe.." required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">
                </div>
                <div id="formtableauconnexion">
                    <input type="password" id="passreset" name="pass2" placeholder="Retaper mot de passe.." required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">
                </div>
                <input type="hidden" name="mfr" id="mfr" value="<?php echo $mfr ?>" />
                <br>
                <br>
                <div id="formtableausubmit">
                    <button type="submit" id="submit">Valider</button>
                </div>
            </div>
        </form>
    </div>

</body>
<script src="Js/Style.js"></script>
</html>


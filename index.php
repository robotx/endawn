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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Style/normalize.css" />
    <link rel="stylesheet" href="Style/style.css" />
</head>
<body>

<div id="topbar">
<a href="index.php"><h1 class="maintitle">Lyniria</h1></a>
<?php if(!isset($_SESSION['id'])) echo '<a href="#" onclick="document.getElementById(\'idinscription\').style.display=\'none\';document.getElementById(\'iddemandederesetmdp\').style.display=\'none\';document.getElementById(\'idconnexion\').style.display=\'block\'"><h3 id="connect" class="title">Connexion</h3></a>
<a href="#" onclick="document.getElementById(\'idconnexion\').style.display=\'none\';document.getElementById(\'iddemandederesetmdp\').style.display=\'none\';document.getElementById(\'idinscription\').style.display=\'block\'"><h3 id="inscription" class="title">Inscription</h3></a>'?>
</div>
<div class="sidebar card animate-left" style="display:none" id="mySidebar">
    <?php
    if(!isset($_SESSION['id']) && !is_null($_SESSION['pseudo'])) { echo "<img class='avatar' src='.$avatar.'/>
    <h2 class='avatarname'>Bonjour, " . $pseudo ."</h2>"; } else echo "<div></div><br/><br/><br/>"?>
    <a href="#"><div class="button1" id="adminproj"><h3 id="adminbtntitle" class="title">Administration du projet</h3></div></a>
    <a href="#"><div class="button1" id="News"><h3 class="title">Actualité</h3></div></a>
    <a href="#"><div class="button1" id="Forum"><h3 class="title">Forum</h3></div></a>
    <a href="#"><div class="button1" id="Revue"><h3 class="title">Revue</h3></div></a>
    <a href="#"><div class="button1" id="Timeline"><h3 class="title">Timeline</h3></div></a>
    <a href="#"><div class="button1" id="adminsite"><h3 id="adminbtntitle" class="title">Administration du site</h3></div></a>
    <a href="Traitement/logout.php"><img id="logout" width="70" height="70" src="Style/img/logout.svg" /></a>

    <img id="closeNav" onclick="w3_close()" width="50" height="50" src="Style/img/leftarrow.svg" />
</div>

<div id="main">

    <img id="openNav" onclick="w3_open()" width="50" height="50" src="Style/img/rightarrow.svg" />

    <div id="idinscription" class="modal">
        <span onclick="document.getElementById('idinscription').style.display='none'" class="close" title="Close Modal">&times;</span>
            <form id="forminscription" method="post" action="Traitement/Inscription.php" enctype="multipart/form-data">
                <h2 id="formtitle">Inscription</h2>
                <div id="formtableau">
                    <input class="input-field" type="text" id="nom" name="nom" placeholder="Nom" required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">

                    <input class="input-field" type="text" id="prenom" name="prenom" placeholder="Prenom" required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">
                </div>

                <div id="formtableau">
                    <input class="input-field" type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">
                    <input class="input-field" type="text" id="email" name="email" placeholder="Email" required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">
                </div>

                <div id="formtableau">
                    <select id="sexe" name="sexe">
                        <option value="Masculin">Masculin</option>
                        <option value="Feminin">Feminin</option>

                        <input class="input-field" type="date" id="age" name="age">
                </div>
                <div id="formtableau">
                    <select id="pays" name="pays">
                        <option value="France">France</option>
                        <option value="Canada">Canada</option>
                        <option value="USA">USA</option>
                    </select>

                    <!-- On limite le fichier à 100Ko -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                    <label for="file-upload" class="custom-file-upload">...</label>
                    <input id=file-upload type="file" name="avatar">
                    <div id="uploadavatar">avatar</div>
                </div>
                <div id="formtableau">
                    <input class="input-field" type="password" id="pass" name="pass"
                           placeholder="Mot de passe" required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">

                    <input class="input-field" type="password" id="password_confirm" name="password_confirm"
                           placeholder="Retaper le mot de passe" required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">
                </div>
                <input type="hidden" name="token" id="token" value="<?php echo $tokenins ?>" />
                <br>
                <br>
                <div id="formtableausubmit">
                    <button type="submit" id="submit" class="btn">Valider</button>
                </div>
            </form>
        </div>


    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////!-->

    <div id="idconnexion" class="modal2">
          <span onclick="document.getElementById('idconnexion').style.display='none'" class="close" title="Close Modal">&times;</span>
          <form class="formconnexion" method="post" action="Traitement/Connexion.php">
            <div class="container">
              <label id="formtitleconnexion"><h1>Connexion</h1></label>
              <br>
                <div id="formtableauconnexion">
                    <input type="text" id="pseudoconnexion" name="pseudo" placeholder="Pseudo.." required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">
                </div>
                    <div id="formtableauconnexion">
                      <input type="password" id="passconnexion" name="pass" placeholder="Mot de passe.." required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">
                    </div>
                    <input type="hidden" name="token" id="token" value="<?php echo $token ?>" />
                    <?php echo '<a href="#" onclick="document.getElementById(\'idconnexion\').style.display=\'none\';document.getElementById(\'idinscription\').style.display=\'none\';document.getElementById(\'iddemandederesetmdp\').style.display=\'block\'"><span id="mdpoublier">Mot de passe oublié ?</span></a> '?>
                        <br>
                        <br>
                          <div id="formtableausubmit">
                            <button type="submit" id="submit">Valider</button>
                          </div>
              </div>
          </form>
        </div>

    <div id="iddemandederesetmdp" class="modaldemandederesetmdp">
        <span onclick="document.getElementById('iddemandederesetmdp').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="formdemandederesetmdp" method="post" action="Traitement/Gestion/resetaskmdp.php">
            <div class="container">
                <label id="formtitleconnexion"><h1>Réinitialisation mot de passe</h1></label>
                <br>
                <div id="formtableauconnexion">
                    <input class="input-field" type="text" id="emailforreset" name="email" placeholder="Email" required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">
                </div>
                <input type="hidden" name="token" id="token" value="<?php echo $token ?>" />
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
<script src="Js/Connexion.js"></script>
<script src="Js/jquery-3.3.1.min.js"></script>
</html>


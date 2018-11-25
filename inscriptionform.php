<?php
require_once ('Outils/glofunction.php');
session_start();
if(isset($_SESSION['id']))
{header("location: index.php"); die();}

$token = md5(uniqid(rand(), TRUE));
$_SESSION['tokenins'] = $token;
$_SESSION['token_timeins'] = time();
?>

<?php
require('Traitement/bdd/Connect.php')
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
<a href="connexion.php"><h3 id="connect" class="title">Connexion</h3></a>
<a href="inscriptionform.php"><h3 id="inscription" class="title">Inscription</h3></a>
</div>
<div class="sidebar card animate-left" style="display:none" id="mySidebar">
    <div class="button1" id="adminproj"><a href="#"><h3 class="title">Administration du projet</h3></a></div>
    <div class="button1" id="News"><a href="#"><h3 class="title">News</h3></a></div>
    <div class="button1" id="Forum"><a href="#"><h3 class="title">Forum</h3></a></div>
    <div class="button1" id="Revue"><a href="#"><h3 class="title">Revue</h3></a></div>
    <div class="button1" id="Timeline"><a href="#"><h3 class="title">Timeline</h3></a></div>
    <div class="button1" id="adminsite"><a href="#"><h3 class="title">Administration du site</h3></a></div>

    <img id="closeNav" onclick="w3_close()" width="50" height="50" src="Style/leftarrow.svg" />
</div>

<div id="main">

    <img id="openNav" onclick="w3_open()" width="50" height="50" src="Style/rightarrow.svg" />


    <form id="forminscription" method="post" action="Traitement/Inscription.php" enctype="multipart/form-data">
        <h2>Inscription</h2>
        <i class="fa fa-user icon"></i>
        <input class="input-field" type="text" id="nom" name="nom" placeholder="Nom" required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">

        <i class="fa fa-user icon"></i>
        <input class="input-field" type="text" id="prenom" name="prenom" placeholder="Prenom" required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">

        <i class="fa fa-user icon"></i>
        <input class="input-field" type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">

        <i class="fa fa-envelope icon"></i>
        <input class="input-field" type="text" id="email" name="email" placeholder="Email" required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">

        <i class="fa fa-key icon"></i>
        <select id="sexe" name="sexe">
            <option value="Masculin">Masculin</option>
            <option value="Feminin">Feminin</option>

            <i class="fa fa-key icon"></i>
            <input class="input-field" type="date" id="age" name="age">

            <i class="fa fa-key icon"></i>
            <select id="pays" name="pays">
                <option value="France">France</option>
                <option value="Canada">Canada</option>
                <option value="USA">USA</option>
            </select>

            <!-- On limite le fichier à 100Ko -->
            <input type="hidden" name="MAX_FILE_SIZE" value="100000">
            Fichier : <input type="file" name="avatar">
            <br>
            <br>
            <i class="fa fa-key icon"></i>
            <input class="input-field" type="password" id="pass" name="pass"
                   placeholder="Mot de passe" required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">

            <i class="fa fa-key icon"></i>
            <input class="input-field" type="password" id="password_confirm" name="password_confirm"
                   placeholder="Retaper le mot de passe"required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">

            <input type="hidden" name="token" id="token" value="<?php echo $token ?>" />

            <button type="submit" class="btn">Valider</button>
    </form>


</body>
<script  src="Js/Style.js"></script>

</html>

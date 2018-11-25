<?php
require_once ('Outils/glofunction.php');
session_start();
if(isset($_SESSION['id']))
{header("location: index.php"); die();}

$token = md5(uniqid(rand(), TRUE));
$_SESSION['tokenins'] = $token;
$_SESSION['token_timeins'] = time();
?>

<!DOCTYPE html>
<html>
<head>

    <title>Inscription</title>
    <meta charset="utf-8">


</head>

<body>


<form method="post" action="Traitement/Inscription.php" enctype="multipart/form-data" style="max-width:500px;margin:auto">
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


</html>

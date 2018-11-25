<?php
require('Traitement/bdd/Connect.php');

session_start();

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
</head>
<body>
<div class="sidebar card animate-left" style="display:none" id="mySidebar">
    <div class="button1" style="margin-top:10%;background-color: blueviolet;"><a href="#" >Administration du projet</a></div>
    <img id="closeNav" onclick="w3_close()" width="50" height="50" src="Style/leftarrow.svg" />
</div>

<div id="main">

    <div id="topbar">
        <div class="w3-container">
            <h1 style="color:white;text-align:center">Endawn</h1>
        </div>
        <img id="openNav" onclick="w3_open()" width="50" height="50" src="Style/rightarrow.svg" />

    </div>

    <form class="modal-content" method="post" action="Traitement/Connexion.php">
        <div class="container">
            <label class="textcolor"><h1>Connexion</h1></label>
            <label class="textcolor"><p>Completez le formulaire pour vous connecter.</p></label>
            <hr>
            <label for="pseudo" class="textcolor"><b>Pseudo</b></label>
            <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo.." required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">

            <label for="pass" class="textcolor"><b>Password</b></label>
            <input type="password" id="pass" name="pass" placeholder="Mot de passe.." required oninvalid="this.setCustomValidity('Veuillez renseigner tous les champs !')">

            <input type="hidden" name="token" id="token" value="<?php echo $token ?>" />

            <label>
                <input class="textcolor" type="checkbox" checked="checked" name="remember" style="margin-bottom:15px">
                <label class="textcolor"><b>Se souvenir de moi</b></label>
            </label>

            <div class="clearfix">
                <button type="button" onclick="document.getElementById('idconnexion').style.display='none'" class="cancelbtn">Annuler</button>
                <button type="submit" class="signupbtn">Connexion</button>
            </div>
        </div>
    </form>

</body>
<script>
    function w3_open() {
        document.getElementById("main").style.marginLeft = "15%";
        document.getElementById("mySidebar").style.width = "15%";
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("openNav").style.display = 'none';
    }
    function w3_close() {
        document.getElementById("main").style.marginLeft = "0%";
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("openNav").style.display = "inline-block";
    }
</script>
</html>


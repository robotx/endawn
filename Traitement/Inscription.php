<?php
define("safe","OK");
require_once('bdd/Connect.php');
require_once ('../Outils/glofunction.php');
session_start();
define('DELAI_MAXIMUM', 600);

if($_POST['token'] == $_SESSION['tokenins']
    && (time() - $_SESSION['token_timeins']) <= DELAI_MAXIMUM)
{


    $noerrorresultat= false;
    $errors = [];
    $errors_exist = [];
    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $pseudo = htmlentities($_POST['pseudo']);
    $pass = htmlentities($_POST['pass']);
    $password_confirm = htmlentities($_POST['password_confirm']);
    $email = htmlentities($_POST['email']);
    $sexe = htmlentities($_POST['sexe']);
    $age = htmlentities($_POST['age']);
    $pays = htmlentities($_POST['pays']);

    sleep(1);
    $sql = "SELECT * FROM Users WHERE pseudo='$pseudo'";
    try {
        $select = $pdo->prepare($sql);
        $select->execute();
    } catch (PDOException $e){erreur("98","t_in_error_1");} //echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
    while($data = $select->fetch())
    {
        $pseudoresult = $data['pseudo'];
    }

    $sql = "SELECT * FROM Users WHERE email='$email'";
    try {
        $select = $pdo->prepare($sql);
        $select->execute();
    } catch (PDOException $e){erreur("98","t_in_error_2");} //echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
    while($data = $select->fetch())
    {
        $emailresult = $data['email'];
    }

    $sql = "SELECT * FROM Userstemp WHERE pseudo='$pseudo'";
    try {
        $select = $pdo->prepare($sql);
        $select->execute();
    } catch (PDOException $e){erreur("98","t_in_error_3");} //echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
    while($data = $select->fetch())
    {
        $pseudoresult2 = $data['pseudo'];
    }

    $sql = "SELECT * FROM Userstemp WHERE email='$email'";
    try {
        $select = $pdo->prepare($sql);
        $select->execute();
    } catch (PDOException $e){erreur("98","t_in_error_4");} //echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
    while($data = $select->fetch())
    {
        $emailresult2 = $data['email'];
    }

    /*CONDITIONS*/
//Si le champ nom est vide
    if(empty($nom)){
        $errors[$nom] = "Champs vide";
        erreur("577","t_in_error_1","nom");
        die();
    }
//Si prenom est vide
    if(empty($prenom)){
        $errors[$prenom] = "Champs vide";
        erreur("577","t_in_error_2","prenom");
        die();
    }
//Si le pseudo est vide ou qu'il contient des charactères spéciaux
    if(empty($pseudo) || !preg_match('/^[a-zA-Z0-9_]+$/', $pseudo)){
        $errors[$pseudo] = "Votre pseudo n'est pas valide (Alphanumérique)";
        erreur("577","t_in_error_3","Votre pseudo n'est pas valide (Alphanumérique)");
        die();
    }
//Si l'adresse mail est vide ou invalide
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[$email] = "Votre email n'est pas valide";
        erreur("577","t_in_error_4","Votre email n'est pas valide");
        die();
    }
//Si le mot de passe est vide ou différent l'un l'autre
    if(empty($pass) || $pass != $password_confirm || empty($password_confirm)){
        $errors[$pass] = "Vous devez rentrer un mot de passe valide";
        erreur("577","t_in_error_5","Vous devez rentrer un mot de passe valide");
        die();
    }
//Si le champ sexe est vide
    if(empty($sexe)){
        $errors[$sexe] = "Champs vide";
        erreur("577","t_in_error_6","sexe");
        die();
    }
//Si l'age est vide
    if(empty($age)){
        $errors[$age] = "Champs vide";
        erreur("577","t_in_error_7","age");
        die();
    }
//Si la pays vide
    if(empty($pays)){
        $errors[$pays] = "Champs vide";
        erreur("577","t_in_error_8","pays");
        die();
    }

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! //

    define('WIDTH_MAX', 300);    // Largeur max de l'image en pixels
    define('HEIGHT_MAX', 200);  // Hauteur max de l'image en pixels
    $erreurimg;
    $erreurimgupload;
    $dossier = '../style/img/upload/';
    $fichier = basename($_FILES['avatar']['name']);
    $taille_maxi = 100000;
    $taille = filesize($_FILES['avatar']['tmp_name']);
    $dimensions = getimagesize($_FILES['avatar']['tmp_name']);
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    $extension = strrchr($_FILES['avatar']['name'], '.');
//Début des vérifications de sécurité...

    if(!empty($taille)){
        if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
            $erreurimg = "Vous devez uploader un fichier de type png, gif, jpg, jpeg...";
            header('location: ../error.php?iderror='.$erreurimg.'');
            die();
        }
        if($taille>$taille_maxi)
        {
            $erreurimg = "Le fichier est trop gros...";
            header('location: ../error.php?iderror='.$erreurimg.'');
            die();
        }
        if($dimensions[0] != WIDTH_MAX || $dimensions[1] != HEIGHT_MAX){

            $erreurimg = "L'image doit être du 300x200 pixels";
            header('location: ../error.php?iderror='.$erreurimg.'');
            die();

        }
        if(!isset($erreurimg)) //S'il n'y a pas d'erreur, on upload
        {
            //On formate le nom du fichier ici...
            $fichier = strtr($fichier,
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {
                echo 'Upload effectué avec succès !\n';

            }
            else //Sinon (la fonction renvoie FALSE).
            {
                erreur("119","t_in_error_1");
                die();
            }
        }
        else
        {
            erreur("120","t_in_error_1",$erreurimg);
            die();
        }
    }else if(empty($taille)){
        $fichier = "profileempty.png";
    }

// Si le tableau d'erreur est vide alors il execute la commande sql //
    if(empty($errors)){
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! adresse email et pseudo existants !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//

        if($pseudo == $pseudoresult){
            $errors_exist[$pseudo] = "Ce pseudo est déjà utilisé ! ";
            erreur("342","t_in_error_1");
            die();
        }
        if($email == $emailresult){
            $errors_exist[$email] = "Cette adresse email est déjà utilisée !";
            erreur("343","t_in_error_1");
            die();
        }
        if($pseudo == $pseudoresult2){
            $errors_exist[$pseudo] = "Ce pseudo est déjà utilisé ! ";
            erreur("342","t_in_error_2");
            die();
        }
        if($email == $emailresult2){
            $errors_exist[$email] = "Cette adresse email est déjà utilisée !";
            erreur("343","t_in_error_2");
            die();
        }
        if(empty($errors_exist)){
            try {
                $clef = "0123456789";
                $clef = rand();
                $timestamp= time()+86400; //24h
                $sql = "INSERT INTO Userstemp(nom, prenom, pseudo, pass, email, sexe, age, pays, lien_image, timestamp1, clef)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $insert = $pdo->prepare($sql);
                $insert->execute(array($nom,$prenom,$pseudo,password_hash($pass, PASSWORD_DEFAULT),$email,$sexe,$age,$pays, "style/img/upload/$fichier", $timestamp, $clef));
                $noerrorresultat = true;
            }
            catch(PDOException $e)
            {
                erreur("98","t_in_error_5");//echo $sql . "<br>" . $e->getMessage();
            }
        }else{
            echo "<pre>";
            print_r($errors_exist);
            echo "</pre>";
        }
    }else{
        echo "<pre>";
        print_r($errors);
        echo "</pre>";
    }

    if ($noerrorresultat == true)
    {
        ?><font color="green"><big>Vous allez reçevoir un mail pour la validation de votre compte</big></font><br/><?php

        $mail_destinataire = $email;
        $sujet = "Validation de l'inscription sur le site Endawn";
        $message = "Cet email a été envoyé à partir de http://www.endawn.com
                     Petit rappel de tes identifiants :
                     Ton pseudo est: $pseudo
                     Ton mot de passe est: ********
                     Cet email nous permet de verifier que ton adresse mail est correcte.
                     Clique sur le lien ci dessous afin de valider ton inscription :
                     http://127.0.0.1/endawn/Traitement/Inscriptionvalide.php?pseudo=$pseudo&clef=$clef
                     (Lien valide pendant 24h)

                     Cordialement
                     Administrateur";
        $head = "Bonjour $pseudo ";
        mail($mail_destinataire, $sujet, $message, $head);
    }else{
        erreur("98","t_in_error_1_send");
        die();
    }


}else{
    erreur("933","t_in_error_1");
}
$messageemail = "Un email de confirmation vous a été envoyé.";
header('location: ../info.php?idinfo='.$messageemail.'');
?>

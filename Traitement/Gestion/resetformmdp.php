<?php
define("safe","OK");
require_once ('../bdd/Connect.php');
require_once ('../../Outils/glofunction.php');

session_start();

//******************************************************* PAS ENCORE FINI

$email = htmlentities($_POST['email']);

$sql = "SELECT * FROM `Users` WHERE pseudo='$email'";
try {
    $select = $pdo->prepare($sql);
    $select->execute();
} catch (PDOException $e){erreur("99","t_ges_rei_m_error_2"); die();}//echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
while($data = $select->fetch())
{
    $emailsql = $data["email"];
    $pseudosql = $data["pseudo"];
}
if($email != $emailsql){ // si l'adresse mail n'existe pas
    infowarn("1","Si l'adresse mail éxiste vous receverez un mail pour la rénitialisation de mot de passe.");
    die();
}else{ // si l'adresse mail existe
        $password = generation_pwd(6);

        $mail_destinataire = $emailsql;
        $sujet = "Reinitialisation du mot de passe";
        $message = "Cet email a été envoyé à partir de http://www.endawn.com .
        Tu as fait une demande de réinitialisation de mot de passe.
        Voici ton mot de passe : '.$password.'
        
        Lien vers la réinitialisation de mot de passe : 
        
        Cordialement
        Administrateur";
        $head = "Bonjour $pseudosql ";
        mail($mail_destinataire, $sujet, $message, $head);
    infowarn("1","Si l'adresse mail éxiste vous receverez un mail pour la rénitialisation de mot de passe.");
    }

?>

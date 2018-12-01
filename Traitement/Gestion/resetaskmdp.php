<?php
define("safe","OK");
require_once ('../bdd/Connect.php');
require_once ('../../Outils/glofunction.php');

session_start();

//******************************************************* PAS ENCORE FINI

$email = htmlentities($_POST['email']);

$sql = "SELECT * FROM `Users` WHERE email='$email'";
try {
    $select = $pdo->prepare($sql);
    $select->execute();
} catch (PDOException $e){erreur("99","t_ges_rei_m_error_2"); die();}//echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
while($data = $select->fetch())
{
    $emailsql = $data["email"];
    $pseudosql = $data["pseudo"];
    $r_mdp_clefsql = $data["r_mdp_clef"];
    $r_mdp_timesql = $data["r_mdp_time"];
    $r_mdp_nbsql = $data["r_mdp_nb"];
}
$tempsnow = date('Y-m-d H:i:s');
$tempsnowconversion = gettimes_timestamps($tempsnow);

if($email != $emailsql){ // si l'adresse mail n'existe pas
    infowarn("1","Si l'adresse mail éxiste vous receverez un mail pour la rénitialisation de mot de passe.");
    die();
}else{ // si l'adresse mail existe
    if($r_mdp_nbsql < 3 && ($r_mdp_timesql > $tempsnowconversion || $r_mdp_timesql == "NULL")){
        try {
            $password = generation_pwd(6);
            $timeoneeday = 86400; // 1 jour en secondes
            $timevalidlink = $tempsnowconversion + $timeoneeday;
            $r_mdp_nbplusun = $r_mdp_nbsql + 1;
            updateinfo("Users", $pdo, "r_mdp_clef", "email", $emailsql, password_hash($password, PASSWORD_DEFAULT));
            updateinfo("Users", $pdo, "r_mdp_time", "email", $emailsql, $timevalidlink);
            updateinfo("Users", $pdo, "r_mdp_nb", "email", $emailsql, $r_mdp_nbplusun);


            $mail_destinataire = $emailsql;
            $sujet = "Reinitialisation du mot de passe";
            $message = "Cet email a été envoyé à partir de http://www.endawn.com .\n".
            "Tu as fait une demande de réinitialisation de mot de passe.\n".
            "Lien vers la réinitialisation de mot de passe : http://127.0.0.1/endawn/resetpassword.php?mfr=$email\n".
                    
            "Rentre le code arpès avoir cliqué sur le lien : $password\n\n".
                        
            "Cordialement,\n".
            "Administrateur";
            $head = "Bonjour $pseudosql ";
            mail($mail_destinataire, $sujet, $message, $head);
            infowarn("1","Si l'adresse mail éxiste vous receverez un mail pour la rénitialisation de mot de passe.");

    }catch(PDOException $e)
    {
        erreur("98","t_g_res_error_2"); die();//echo $sql . "<br>" . $e->getMessage();
    }}else {
        erreur("146", "t_g_res_error_1");
    }}

?>

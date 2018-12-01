<?php
define("safe","OK");
require_once ('../bdd/Connect.php');
require_once ('../../Outils/glofunction.php');

session_start();

//******************************************************* PAS ENCORE FINI

$code = htmlentities($_POST['code']);
$pass1 = htmlentities($_POST['pass1']);
$pass2 = htmlentities($_POST['pass2']);
$mfr = htmlentities($_POST['mfr']);

if(empty($code)){
    erreur("42","t_ges_error_1");
    die();
}
if(empty($pass1) || $pass1 != $pass2 || empty($pass2)){
    erreur("43","t_ges_error_2");
    die();
}
if(empty($mfr)){
    erreur("44","$mfr");
    die();
}

$sql = "SELECT * FROM `Users` WHERE email='$mfr'";
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

if($mfr != $emailsql){
    erreur("44","t_ges_error_4");
    die();
}else{
    if($r_mdp_nbsql <= 3){
        if($r_mdp_timesql != "NULL" && $r_mdp_timesql < $tempsnowconversion){
            updateinfo("Users", $pdo, "r_mdp_clef", "email", $emailsql, "rien");
            updateinfo("Users", $pdo, "r_mdp_time", "email", $emailsql, "NULL");
            updateinfo("Users", $pdo, "r_mdp_nb", "email", $emailsql, 0);

            erreur("99","t_ges_res_error_3"); die();//echo $sql . "<br>" . $e->getMessage();
        }else{
            if($r_mdp_nbsql < 3 && $r_mdp_timesql > $tempsnowconversion && password_verify($code, $r_mdp_clefsql)){
                try {
                    updateinfo("Users", $pdo, "r_mdp_clef", "email", $emailsql, "rien");
                    updateinfo("Users", $pdo, "r_mdp_time", "email", $emailsql, "NULL");
                    updateinfo("Users", $pdo, "pass", "email", $emailsql, password_hash($pass1, PASSWORD_DEFAULT));

                    infowarn("1","Votre mot de passe a bien été reinitialisé.");

                }catch(PDOException $e)
                {
                    erreur("99","t_ges_res_error_1"); die();//echo $sql . "<br>" . $e->getMessage();
                }}else{
                    erreur("146", "t_ges_res_error_3");
            }}}
    }

?>

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



?>

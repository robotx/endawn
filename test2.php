<?php
define("safe","OK");
require_once ('Traitement/bdd/Connect.php');
require_once ('Outils/glofunction.php');
define('DELAI_MAXIMUM', 600);

session_start();


if($_POST['token'] == $_SESSION['token']
    && (time() - $_SESSION['token_time']) <= DELAI_MAXIMUM)
{

    $pseudo = htmlentities($_POST['pseudo']);
    $pass = htmlentities($_POST['pass']);

    if(empty($pseudo) || empty($pass))
    {
        erreur("577","t_co_error_1");
    }
    else
    {
            $sql = "SELECT * FROM Users WHERE pseudo='$pseudo'";
            try {
                $select = $pdo->prepare($sql);
                $select->execute();
            } catch (PDOException $e){erreur("98","t_co_error_2");} //echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
            while($data = $select->fetch())
            {
                $idresult = $data['id'];
                $nomresult = $data['nom'];
                $prenomresult = $data['prenom'];
                $pseudoresult = $data['pseudo'];
                $passresult = $data['pass'];
                $emailresult = $data['email'];
                $sexeresult = $data['sexe'];
                $ageresult = $data['age'];
                $paysresult = $data['pays'];
                $avatarresult = $data['avatar'];
                $bansql = $data['ban'];
                $avertissementsql = $data['avertissement'];
                $grouperesult = $data['groupid'];
            }

            if($pseudoresult == $pseudo && password_verify($pass, $passresult))
            {
                if($avertissementsql >= 3){
                    try {
                        $sql = "UPDATE Users SET ban='oui' WHERE pseudo='$pseudoresult' AND id='$idresult'";
                        $insert = $pdo->prepare($sql);
                        $insert->execute();
                        $noerrorresultat2 = true;
                        $bansql = "oui";
                    }catch(PDOException $e){erreur("98","t_co_error_1.1"); $noerrorresultat2 = false;}//echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
                };
                //--------------------------------
                    session_start();
                    $_SESSION['id'] = $idresult;
                    $_SESSION['nom'] = $nomresult;
                    $_SESSION['prenom'] = $prenomresult;
                    $_SESSION['pseudo'] = $pseudoresult;
                    $_SESSION['email'] = $emailresult;
                    $_SESSION['sexe'] = $sexeresult;
                    $_SESSION['age'] = $ageresult;
                    $_SESSION['pays'] = $paysresult;
                    $_SESSION['avatar'] = $avatarresult;
                    $_SESSION['groupid'] = $grouperesult;

                    if($grouperesult == 0){
                        $grouperesult = "Membre";
                        $_SESSION['groupid'] = $grouperesult;
                    }
                    if($grouperesult == 1){
                        $grouperesult = "Admin";
                        $_SESSION['groupid'] = $grouperesult;
                    }
                    if($grouperesult == 2){
                        $grouperesult = "Fondateur";
                        $_SESSION['groupid'] = $grouperesult;
                    }

                    header('location: index.php');
                }else{
                erreur("788","t_co_error_1");
                die();
        }
        }}else{
    erreur("933","t_co_error_1");
    die('Session expirée !');
}

?>

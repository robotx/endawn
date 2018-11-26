<?php
define("safe","OK");
require_once ('bdd/Connect.php');
require_once ('../Outils/glofunction.php');
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

        $ip = $_SERVER['REMOTE_ADDR'];
        sleep(1);

        $sql = "SELECT * FROM spamconnexion WHERE ip='$ip' ORDER BY timestamp ASC";
        try {
            $recherche = $pdo->prepare($sql);
            $recherche->execute();
        } catch (PDOException $e){erreur("98","t_co_error_1");} //echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
        $count = $recherche->rowCount();

        if($count >= 10){
            $resultip = $recherche->fetchAll(\PDO::FETCH_ASSOC);

            $tempsnow = date('Y-m-d H:i:s');
            $tempsnowconversion = gettimes_timestamps($tempsnow);

            $timefirstban = $resultip[0][timestamp]; //check la valeur
            $tempsnowconversionfirsttime = gettimes_timestamps($timefirstban);

            $timeretry = $tempsnowconversionfirsttime + 86400;

            if($timeretry < $tempsnowconversion){
                try {
                    $sql = "DELETE FROM spamconnexion WHERE ip='$ip'";
                    $delip = $pdo->prepare($sql);
                    $delip->execute();
                } catch (PDOException $e){erreur("98","t_co_error_1.2");} //echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
            }
        }

        $sql = "SELECT * FROM spamconnexion WHERE ip='$ip'";
        try {
            $recherche = $pdo->prepare($sql);
            $recherche->execute();
        } catch (PDOException $e){erreur("98","t_co_error_1.1");} //echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
        $count2 = $recherche->rowCount();

        if($count2 < 10){

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
                if($bansql == "non"){
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

                    header('location: ../index.php');
                }else{
                    //if($bansql == "oui"){} quand on pourra ban avec du temps
                    erreur("789", "t_co_error_1");}
            }else{

                try {
                    $tempsnowip = date('Y-m-d H:i:s');
                    $sql = "INSERT INTO spamconnexion(pseudo, ip, timestamp)
    VALUES (?, ?, ?)";
                    $insert = $pdo->prepare($sql);
                    $insert->execute(array($pseudo,$ip, $tempsnowip));
                    $noerrorresultat = true;
                }
                catch(PDOException $e)
                {
                    erreur("98","t_co_error_3");//echo $sql . "<br>" . $e->getMessage();
                }

                erreur("11","t_co_error_1");
                die();
            }
        }else{
            erreur("788","t_co_error_1");
            die();

        }}}else{
    erreur("933","t_co_error_1");
    die('Session expirée !');
}

?>

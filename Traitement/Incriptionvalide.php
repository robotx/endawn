<?php
define("safe","OK");
require_once('bdd/Connect.php');
require_once ('../Outils/glofunction.php');

$noerrorresultat= false;
$noerrorresultatredirect = false;
$validationmessagee = false;
$validationclefmessagerie = false;
$supprvalid = false;


$pseudosearch = htmlentities($_GET["pseudo"]);
$clefsearch = htmlentities($_GET["clef"]);


$sql = "SELECT * FROM Userstemp WHERE pseudo='$pseudosearch'";
try {
    $select = $pdo->prepare($sql);
    $select->execute();
} catch (PDOException $e){erreur("98","t_in_v_error_1");} //echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
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
    $lien_imageresult = $data['lien_image'];
    $timestampresult = $data['timestamp1'];
    $clefresult = $data['clef'];
    $grouperesult = $data['groupid'];
}

$tempsnow = date('Y-m-d H:i:s');
$tempsnowconversion = gettimes_timestamps($tempsnow);

if($timestampresult < $tempsnowconversion){

    $noerrorresultatredirect = true;
    $noerrorresultat = true;
    $noerrorresultatclefmessagerie = true;

}else{

    if($validationmessagee == true && $validationclefmessagerie == true){
        try {
            $sql = "INSERT INTO Users(nom,prenom,pseudo, pass, email, sexe, age, pays, lien_image)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $insert = $pdo->prepare($sql);
            $insert->execute(array($nomresult,$prenomresult,$pseudoresult,$passresult,$emailresult,$sexeresult,$ageresult,$paysresult, $lien_imageresult));
            $noerrorresultat = false;
        }
        catch(PDOException $e)
        {
            erreur("98","t_in_v_error_5.2");//echo $sql . "<br>" . $e->getMessage();
            $noerrorresultat = true;
        }

    }else{
        erreur("156","t_in_v_error_5");
    }
}

if($noerrorresultat == false){
    try {
        $sql = "DELETE FROM Userstemp WHERE id='$idresult'";
        $select = $pdo->prepare($sql);
        $select->execute();
        $supprvalid = true;
    }
    catch(PDOException $e)
    {
        erreur("98","t_in_v_error_6");//echo $sql . "<br>" . $e->getMessage();
        $supprvalid = false;
    }
}else if(($noerrorresultatredirect == true || $noerrorresultat == true) || $validationmessagee == false || $noerrorresultatclefmessagerie == true || $validationclefmessagerie == false){
    try {
        $sql = "DELETE FROM Userstemp WHERE id='$idresult'";
        $select = $pdo->prepare($sql);
        $select->execute();
        $supprvalid = false;
    }
    catch(PDOException $e)
    {
        erreur("98","t_in_v_error_7");//echo $sql . "<br>" . $e->getMessage();
        $supprvalid = false;
    }
    erreur("338","t_in_v_error_1");
    die();

}
if($noerrorresultatredirect == false && ($supprvalid == true && $validationmessagee == true && $validationclefmessagerie == true)){
    $messagebv = "Bienvenue, vous êtes maintenant inscrit sur le site. Vous pouvez désormais vous connecter.";
    header('location: ../info.php?idinfo='.$messagebv.'');
    die();
}else if($noerrorresultatredirect == true && ($supprvalid == false && $validationmessagee == false && $validationclefmessagerie == false)){
    erreur("156","t_in_v_error_666");
    die();
}

?>

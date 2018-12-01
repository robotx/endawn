<?php
require_once ('Outils/glofunction.php');

//define('WIDTH_MAX', 300);    // Largeur max de l'image en pixels
//define('HEIGHT_MAX', 200);  // Hauteur max de l'image en pixels
$erreurimg;
$erreurimgupload;
$dossier = $_SERVER['DOCUMENT_ROOT'].'/endawn/Style/img/upload/';
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
        header('location: error.php?iderror='.$erreurimg.'');
        die();
    }
    /*if($taille>$taille_maxi)
    {
        $erreurimg = "Le fichier est trop gros...";
        header('location: error.php?iderror='.$erreurimg.'');
        die();
    }
    if($dimensions[0] != WIDTH_MAX || $dimensions[1] != HEIGHT_MAX){

        $erreurimg = "L'image doit être du 300x200 pixels";
        header('location: error.php?iderror='.$erreurimg.'');
        die();

    }*/
    if(!isset($erreurimg)) //S'il n'y a pas d'erreur, on upload
    {
        //On formate le nom du fichier ici...
        $fichier = strtr($fichier,
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
        if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
        {
            conversionimage($dossier . $fichier,$dossier . "myns" . "_" . $fichier,'100','100',100, $extension);
            unlink($dossier . $fichier);
            echo 'Upload effectué avec succès !\n';

        }
        else //Sinon (la fonction renvoie FALSE).
        {
            echo "119";
        }
    }
    else
    {
        echo "120";
    }
}else if(empty($taille)){
    $fichier = "profileempty.png";
}

echo $fichier;
echo '<br>';
echo $dossier;
echo "<pre>";
print_r($_FILES);
?>
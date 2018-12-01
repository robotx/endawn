<?php

function reduiretexte($texte)
{
    $max_caracteres=70;

    if (strlen($texte)<$max_caracteres){
        $texte = substr($texte, 0, $max_caracteres);
    }
    if(strlen($texte)>$max_caracteres){
        $texte = substr($texte, 0, $max_caracteres);
    }
    return $texte;
}


function unique($array,$key)
{
    $temp_array = [];
    foreach ($array as &$v) {
        if (!isset($temp_array[$v[$key]]))
            $temp_array[$v[$key]] =& $v;
    }
    $array = array_values($temp_array);
    return $array;

}

function generation_pwd($taille)
{
    $password="";
    $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
    for($i=0;$i<$taille;$i++)
    {
        $password .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
    }
    return $password;
}

function infowarn($num, $info)
{
    switch ($num) {
        case "1":
            $information = "$info";
            header('location: ../../info.php?idinfo='.$information.'');
            die();
            break;
}}


function erreur($erreur, $infosupp, $varriable)
{
    switch ($erreur) {
        case "97":
            $error = "Une erreur est survenue, veuillez réesayer ulterieurement. Si le problème persiste, veuillez contacter l'administrateur du site. (97$infosupp)";
            header('location: error.php?iderror='.$error.'');
            die();
            break;
        case "906":
            $error = "Vous n'êtes pas autorisé à envoyer des messages. Pour plus d'informations, veuillez contacter un administrateur. (906$infosupp)";
            header('location: error.php?iderror='.$error.'');
            die();
            break;
        case "98":
            $error = "Une erreur est survenue, veuillez réesayer ulterieurement. Si le problème persiste, veuillez contacter l'administrateur du site. (98$infosupp)";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "99":
            $error = "Une erreur est survenue, veuillez réesayer ulterieurement. Si le problème persiste, veuillez contacter l'administrateur du site. (99$infosupp)";
            header('location: ../../error.php?iderror='.$error.'');
            die();
            break;
        case "501":
            $error = "Une erreur est survenue, veuillez réessayer ulterieurement. Si le problème persiste, veuillez contacter l'administrateur du site. (501$infosupp)";
            header('location: error.php?iderror='.$error.'');
            die();
            break;
        case "502":
            $error = "Une erreur est survenue, veuillez réessayer ulterieurement. Si le problème persiste, veuillez contacter l'administrateur du site. (502$infosupp)";
            header('location: ../../error.php?iderror='.$error.'');
            die();
            break;
        case "623":
            $error = "La news $varriable n'éxiste pas. (623$infosupp)";
            header('location: error.php?iderror='.$error.'');
            die();
            break;
        case "56":
            $error= "L'utilisateur $varriable n'éxiste pas ! (56$infosupp)";
            header('location: error.php?iderror='.$error.'');
            die();
            break;
        case "36":
            $error= "L'utilisateur n'éxiste pas ! (36$infosupp)";
            header('location: error.php?iderror='.$error.'');
            die();
            break;
        case "650":
            $error = "Une erreur est survenue, veuillez réesayer ulterieurement. Si le problème persiste, veuillez contacter l'administrateur du site. (650$infosupp)";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "651":
            $error= "Le destinataire $varriable n'éxiste pas ! (651$infosupp)";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "36000":
            $error= "Une erreur est survenue, veuillez réesayer ulterieurement. Si le problème persiste, veuillez contacter l'administrateur du site. (36000$infosupp)";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "908":
            $error= "Oups... je n'ai pas réussi à retrouver vos messages. :( (908$infosupp)";
            header('location: error.php?iderror='.$error.'');
            die();
            break;
        case "119":
            $error= "Echec de l'upload ! (119$infosupp)";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "11":
            $error= "Vos identifiants sont incorrecte ! (11$infosupp)";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "788":
            $error= "Vous avez effectué trop de tentatives veuillez réessayer ultérieurement ! (788$infosupp)";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "789":
            $error= "Vous avez été banni. (789$infosupp)";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "933":
            $error = "Session expirée ! (933$infosupp)";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "577":
            $error = "Certain champs sont vides ! (577$infosupp) -> $varriable";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "120":
            $error = "Une erreur est survenue, veuillez réesayer ulterieurement. Si le problème persiste, veuillez contacter l'administrateur du site. (120$infosupp) -> $varriable";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "342":
            $error=  "Ce pseudo est déjà utilisé ! (342$infosupp)";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "343":
            $error=  "Cette adresse email est déjà utilisée ! (343$infosupp)";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "156":
            $error= "Un problème est survenu lors de l'inscription , veuillez réesayer ulterieurement ou contacter un administrateur si le problème persiste. (156$infosupp)";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "158":
            $error= "Un problème est survenu lors de l'inscription , veuillez réesayer ulterieurement ou contacter un administrateur si le problème persiste. (158$infosupp)";
            header('location: ../../error.php?iderror='.$error.'');
            die();
            break;
        case "338":
            $error= "Votre lien de confirmation est expiré ! (338$infosupp)";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "339":
            $error= "Le lien de confirmation est expiré ! (339$infosupp)";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "157":
            $error= "Un problème est survenu lors de l'envoi du message , veuillez réesayer ulterieurement ou contacter un administrateur si le problème persiste. (157$infosupp)";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "444":
            $error= "Le mot de passe est incorrecte ! (444$infosupp)";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "268":
            $error= "L'utilisateur avec l'id [$varriable] n'éxiste pas. (268$infosupp)";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "69":
            $error= "Bien tenté ! (69$infosupp)";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "814":
            $error= "Tu te sens si seul que ça ? (814$infosupp)";
            header('location: ../error.php?iderror='.$error.'');
            die();
            break;
        case "341":
            $error= "La messagerie de l'utilisateur est déjà créé (341$infosupp)";
            header('location: ../../error.php?iderror='.$error.'');
            die();
            break;
        case "346":
            $error= "L'utilisateur n'a pas d'image. (346$infosupp)";
            header('location: ../../error.php?iderror='.$error.'');
            die();
            break;
        case "546":
            $error= "L'utilisateur est déjà banni. (546$infosupp)";
            header('location: ../../error.php?iderror='.$error.'');
            die();
            break;
        case "547":
            $error= "L'utilisateur n'est pas banni. (547$infosupp)";
            header('location: ../../error.php?iderror='.$error.'');
            die();
            break;
        case "628":
            $error= "Le compteur d'avertissement est déjà à 0. (628$infosupp)";
            header('location: ../../error.php?iderror='.$error.'');
            die();
            break;
        case "677":
            $error= "Vos mots de passes doivent correspondre. (677$infosupp)";
            header('location: ../../error.php?iderror='.$error.'');
            die();
            break;
        case "679":
            $error= "Lien expiré ! (679$infosupp)";
            header('location: ../../error.php?iderror='.$error.'');
            die();
            break;
        case "706":
            $error= "Le compte n'a pas été trouvé. (706$infosupp)";
            header('location: ../../error.php?iderror='.$error.'');
            die();
            break;
        case "374":
            $error= "Cette email est déjà utilisée. (374$infosupp)";
            header('location: ../../error.php?iderror='.$error.'');
            die();
            break;
        case "146":
            $error= "Le lien est exipiré ou vous avez effectué trop de demande aujourd'hui (code=146)";
            header('location: ../../error.php?iderror='.$error.'');
            die();
            break;
        case "42":
            $error= "Vous devez rentrer une code";
            header('location: ../../error.php?iderror='.$error.'');
            die();
            break;
        case "43":
            $error= "Vous devez rentrer un mot de passe valide";
            header('location: ../../error.php?iderror='.$error.'');
            die();
            break;
        case "44":
            $error= "Lien de réinitialisation expiré !";
            header('location: ../../error.php?iderror='.$error.'');
            die();
            break;
    }
}

function gettimes_timestamps($d)
{
    $dfinal = new DateTime($d);
    return $dfinal->getTimestamp();
}


# ## = l'endroits ou notre nom sera mis
# i = le Regex prends alors les maj et les minuscules
# | = on peut utiliser ou pour faire plusieurs recherche de nom
# ^ = début de la chaine
# $ = fin de la chaine
# [] = permets de faire des recherche par lettre, cela fonctionne comme le |
# - = a-z au lieu de abcdefg ... z
# #[^0-9]# le ^ sert a dire que on en veut pas (inverse)
# ? = ce symbole indique que la lettre est facultative. Elle peut y être 0 ou 1 fois.
# + = la lettre est obligatoire. Elle peut apparaître 1 ou plusieurs fois.
# * = la lettre est facultative. Elle peut apparaître 0, 1 ou plusieurs fois. Mais s'il n'y a pas de la lettre, ça fonctionne aussi !
# #Ay(ay)*# Ce code reconnaîtra « Ay », « Ayay », « Ayayay », « Ayayayay »

# {} = le nombre de répétitions {3}, cela veut dire 3 répétitions {3,5} = 3 a 5 repétitions

# ? revient à écrire {0,1} ;

# + revient à écrire {1,} ;

# * revient à écrire {0,}.

# \ = comme quand on veut écrire dans une chaine de caractère

# \d = Indique un chiffre. Ça revient exactement à taper[0-9]
# \D = Indique ce qui n'est PAS un chiffre. Ça revient à taper[^0-9]
# \w = Indique un caractère alphanumérique ou un tiret de soulignement. Cela correspond à[a-zA-Z0-9_]
# \W = Indique ce qui n'est PAS un mot. Si vous avez suivi, ça revient à taper[^a-zA-Z0-9_]
# \t = Indique une tabulation
# \n = Indique une nouvelle ligne
# \r = Indique un retour chariot
# \s = Indique un espace blanc
# \S = Indique ce qui n'est PAS un espace blanc (\t \n \r)
# . = Indique n'importe quel caractère. Il autorise donc tout !

function bbcodetraitementmessage($texte)
{
    if (isset($texte))
    {
        $texte = stripslashes($texte); // On enlève les slashs qui se seraient ajoutés automatiquement
        $texte = nl2br($texte); // On crée des <br /> pour conserver les retours à la ligne

        $texte = preg_replace('#\[g\](.+)\[/g\]#isU', '<strong>$1</strong>', $texte); //gras
        $texte = preg_replace('#\[i\](.+)\[/i\]#isU', '<em>$1</em>', $texte); //italique
        $texte = preg_replace('#\[s\](.+)\[/s\]#isU', '<u>$1</u>', $texte); //souligner
        $texte = preg_replace('#\[center\](.+)\[/center\]#isU', '$1', $texte); //centrer
        $texte = preg_replace('#\[droite\](.+)\[/droite\]#isU', '$1', $texte); //droite
        $texte = preg_replace('#\[gauche\](.+)\[/gauche\]#isU', '$1', $texte); //gauche
        $texte = preg_replace('#\[justify\](.+)\[/justify\]#isU', '$1', $texte); //justifier
        $texte = preg_replace('#\[size=(7|8|9|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31|32|33|34|35|36|37|38|39|40)\](.+)\[/size\]#isU', '$2', $texte); //taille du texte
        $texte = preg_replace('#\[couleur=(red|green|blue|yellow|purple|olive)\](.+)\[/couleur\]#isU', '<span style="color:$1">$2</span>', $texte); //couleur

        $texte = preg_replace('#\[img\](.+)\[/img\]#iU', 'Image', $texte); //image
        //$texte = preg_replace('#((http|https)://|www)([a-z0-9._/-]|[a-z0-9._/-\?])+#i', '<a href="$0">$0</a>', $texte); // liens
        $texte = preg_replace('#\[url\](.+)\[/url\]#isU', 'Lien vers un site', $texte); //url
        $texte = preg_replace('#\[video\](.+)\[/video\]#isU', 'Lien vers une video', $texte); //video

        return $texte;
    }
}

function bbcodetraitementmessagefocus($texte)
{
    if (isset($texte))
    {
        $texte = stripslashes($texte); // On enlève les slashs qui se seraient ajoutés automatiquement
        $texte = nl2br($texte); // On crée des <br /> pour conserver les retours à la ligne

        $texte = preg_replace('#\[g\](.+)\[/g\]#isU', '<strong>$1</strong>', $texte); //gras
        $texte = preg_replace('#\[i\](.+)\[/i\]#isU', '<em>$1</em>', $texte); //italique
        $texte = preg_replace('#\[s\](.+)\[/s\]#isU', '<u>$1</u>', $texte); //souligner
        $texte = preg_replace('#\[center\](.+)\[/center\]#isU', '<div style="text-align:center">$1</div>', $texte); //centrer
        $texte = preg_replace('#\[droite\](.+)\[/droite\]#isU', '<div style="text-align:right">$1</div>', $texte); //droite
        $texte = preg_replace('#\[gauche\](.+)\[/gauche\]#isU', '<div style="text-align:left">$1</div>', $texte); //gauche
        $texte = preg_replace('#\[justify\](.+)\[/justify\]#isU', '<div style="text-align:justify">$1</div>', $texte); //justifier
        $texte = preg_replace('#\[size=(7|8|9|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31|32|33|34|35|36|37|38|39|40)\](.+)\[/size\]#isU', '<span style="font-size:$1px">$2</span>', $texte); //taille du texte
        $texte = preg_replace('#\[couleur=(red|green|blue|yellow|purple|olive)\](.+)\[/couleur\]#isU', '<span style="color:$1">$2</span>', $texte); //couleur

        $texte = preg_replace('#\[img\](.+)\[/img\]#iU', '<img src="$1" style="width:380px; height:300px;" alt="Image">', $texte); //image
        //$texte = preg_replace('#((http|https)://|www)([a-z0-9._/-]|[a-z0-9._/-\?])+#i', '<a href="$0">$0</a>', $texte); // liens
        $texte = preg_replace('#\[url\](.+)\[/url\]#isU', '<a href="$1">$1</a>', $texte); //url
        $texte = preg_replace('#\[video\](.+)\[/video\]#isU', '<iframe width="640" height="360" src="http://www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe>', $texte); //video

        return $texte;
    }
}

// sudo apt-get install php7.0-gd
function conversionimage($source, $destination, $largeur, $hauteur, $qualite, $extension){
    switch ($extension) {
        case ".jpg":
            $imageSize = getimagesize($source);
            $imageRessource= imagecreatefromjpeg($source);
            $imageFinal = imagecreatetruecolor($largeur, $hauteur);
            $final = imagecopyresampled($imageFinal, $imageRessource, 0,0,0,0, $largeur, $hauteur, $imageSize[0], $imageSize[1]);
            imagejpeg($imageFinal, $destination, $qualite);
            break;
        case ".jpeg":
            $imageSize = getimagesize($source);
            $imageRessource= imagecreatefromjpeg($source);
            $imageFinal = imagecreatetruecolor($largeur, $hauteur);
            $final = imagecopyresampled($imageFinal, $imageRessource, 0,0,0,0, $largeur, $hauteur, $imageSize[0], $imageSize[1]);
            imagejpeg($imageFinal, $destination, $qualite);
            break;
        case ".png":
            $imageSize = getimagesize($source);
            $imageRessource= imagecreatefrompng($source);
            $imageFinal = imagecreatetruecolor($largeur, $hauteur);
            $final = imagecopyresampled($imageFinal, $imageRessource, 0,0,0,0, $largeur, $hauteur, $imageSize[0], $imageSize[1]);
            imagepng($imageFinal, $destination, $qualite);
            break;
        case ".gif":
            $imageSize = getimagesize($source);
            $imageRessource= imagecreatefromgif($source);
            $imageFinal = imagecreatetruecolor($largeur, $hauteur);
            $final = imagecopyresampled($imageFinal, $imageRessource, 0,0,0,0, $largeur, $hauteur, $imageSize[0], $imageSize[1]);
            imagegif($imageFinal, $destination, $qualite);
            break;
        }}

function updateinfo($table, $pdo, $setinDTB, $whereinDTB, $whatinDTB, $insertinDTB){
    try {
        $sql = "UPDATE $table SET $setinDTB='$insertinDTB' WHERE $whereinDTB='$whatinDTB'";
        $insert = $pdo->prepare($sql);
        $insert->execute();

    }catch(PDOException $e)
    {
        erreur("98","o_glo_error_2"); die();//echo $sql . "<br>" . $e->getMessage();
        die();
    }
}
?>

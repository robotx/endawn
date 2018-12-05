<?php
ini_set('display_errors', 'on');

?><font color="green"><big>Vous allez reçevoir un mail pour la validation de votre compte</big></font><br/><?php

        $mail_destinataire = "jzolivier@gmail.com";
        $sujet = "Validation de l'inscription sur le site Endawn";
        $message = "TEST\n".
        "Ceci est un test\n".

        "Cordialement,\n".
        "Administrateur";
        $head = "Bonjour ";
        mail($mail_destinataire, $sujet, $message, $head);

?>

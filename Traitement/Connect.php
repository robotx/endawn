<?php
/*if (!defined("safe")) {
    header('HTTP/1.0 404 Not Found');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL /myns_website/traitement/connect.php was not found on this server.</p><hr>
<address>Apache/2.4.18 (Ubuntu) Server at 127.0.0.1 Port 80</address></body></html>');
}*/

$hote	= 'localhost';
$bdd	= 'new_endawn';
$user	= 'root';
$mdp	= 'mimidu59200';
// ------------------------
try {
    $co_bdd = 'mysql:host='.$hote.';dbname='.$bdd.'';
    $params = array(
        PDO::ATTR_PERSISTENT => true, 				// Connexions persistantes
    );
    $pdo = new PDO($co_bdd, $user, $mdp, $params); // instancie la connexion
}
catch(PDOException $e) {
    $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
}
?>

<?php
require_once ('Traitement/bdd/Connect.php');
require_once ('Outils/glofunction.php');

$sql = "SELECT * FROM Users";
try {
    $select = $pdo->prepare($sql);
    $select->execute();
} catch (PDOException $e){erreur("98","t_co_error_2");} //echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
while($data = $select->fetch())
{
    echo $data["pseudo"];
}
?>
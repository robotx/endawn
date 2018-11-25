<?php

require_once('../Traitement/bdd/Connect.php');

$Users = "Users";
$Userstemp = "Userstemp";
$spamconnexion = "spamconnexion";
try {
    $sqlmember = "CREATE TABLE IF NOT EXISTS $Users (
    id int(11) NOT NULL AUTO_INCREMENT,
    nom varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    prenom varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    pseudo varchar(20) CHARACTER SET utf8mb4 NOT NULL,
    pass varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    email varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    sexe varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    age date NOT NULL,
    pays varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    lien_image varchar(60) CHARACTER SET utf8mb4 NOT NULL,
    timestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    avertissement int(11) NOT NULL DEFAULT '0',
    ban varchar(10) NOT NULL DEFAULT 'non',
    r_mdp_clef varchar(255) NOT NULL DEFAULT 'rien',
    r_mdp_time varchar(255) DEFAULT 'NULL',
    groupid int(1) DEFAULT '0',
    PRIMARY KEY (`id`))";

    $create = $pdo;
    $create->exec($sqlmember);
    echo "La table \"Users\" s'est crééé !<br>";

}catch(PDOException $e){echo $sql . "<br>" . $e->getMessage();die();}

///////////////////////////////////////////////////////////

try {
    $sqlmembertemp = "CREATE TABLE IF NOT EXISTS $Userstemp (
    id int(11) NOT NULL AUTO_INCREMENT,
    nom varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    prenom varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    pseudo varchar(20) CHARACTER SET utf8mb4 NOT NULL,
    pass varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    email varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    sexe varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    age date NOT NULL,
    pays varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    lien_image varchar(60) CHARACTER SET utf8mb4 NOT NULL,
    timestamp1 varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    clef varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    groupid int(1) DEFAULT '0',
    PRIMARY KEY (`id`))";

    $create = $pdo;
    $create->exec($sqlmembertemp);
    echo "La table \"Userstemp\" s'est crééé !<br>";

}catch(PDOException $e){echo $sql . "<br>" . $e->getMessage();die();}

////////////////////////////////////////////////////////////

try {
    $sqlmemberconnexionnb = "CREATE TABLE IF NOT EXISTS $spamconnexion (
    id int(11) NOT NULL AUTO_INCREMENT,
    pseudo varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    ip varchar(255) NOT NULL,
    timestamp varchar(255) NOT NULL,
    PRIMARY KEY (`id`))";
    $create = $pdo;
    $create->exec($sqlmemberconnexionnb);
    echo "La table \"Spamconnexion\" s'est crééé !<br>";

}catch(PDOException $e){echo $sql . "<br>" . $e->getMessage();die();}

////////////////////////////////////////////////////////////




?>
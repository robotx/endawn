<?php

require_once ('../Traitement/Connect.php');

$Users = "Users";
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
    echo "La table Utilisateurs s'est créer !<br>";

}catch(PDOException $e){echo $sql . "<br>" . $e->getMessage();die();}

?>
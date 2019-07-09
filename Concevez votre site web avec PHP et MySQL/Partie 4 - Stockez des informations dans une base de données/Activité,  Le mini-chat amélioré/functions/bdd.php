<?php
try {
    $host = "localhost";
    $db_name = "exercice";
    $user = "root";
    $password = "";
    $bdd = new PDO('mysql:host='.$host.';dbname='.$db_name, $user, $password); // Connexion a la base de données
} catch (Exception $e) {
    echo "Erreur connexion Base de Données : " . $e->getMessage();
}

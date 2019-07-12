<?php
session_start();
if (strlen($_POST["pseudo"]) > 20) {
    header('Location: ../index.php?errorPseudoSup20=1');
}else{
    $_SESSION["pseudo"] = $_POST["pseudo"];
    include "bdd.php";
    $req = $bdd->prepare("INSERT INTO users(pseudo)VALUES(:pseudo)"); // Insert dans la table article les données du formulaire
    $req->bindParam(':pseudo', $_POST["pseudo"]);
    $req->execute();
    header('Location: ../index.php');
}

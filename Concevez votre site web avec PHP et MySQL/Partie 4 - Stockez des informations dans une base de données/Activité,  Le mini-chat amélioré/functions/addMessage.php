<?php
session_start();
if (empty($_SESSION["pseudo"])) {
    header('Location: ../index.php?errorPseudoNotSet=1');
}else{
    include "bdd.php";
    date_default_timezone_set("Europe/Paris");
    $date = date("d") . "/" . date("m") . "/" . date("Y");
    $hourAndMinute = date("H") . ":" . date("i");
    $req = $bdd->prepare("INSERT INTO messages(date, hour, content, sendByUser)VALUES(:date, :hour, :content, :sendByUser)"); // Insert dans la table article les données du formulaire
    $req->bindParam(':date', $date);
    $req->bindParam(':hour', $hourAndMinute);
    $req->bindParam(':content', $_POST["message"]);
    $req->bindParam(':sendByUser', $_SESSION["pseudo"]);
    $req->execute();
    header('Location: ../index.php?messageSent=1');
}
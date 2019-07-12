<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Exercise</title>
</head>

<body>
    <div id="content">
        <?php if (isset($_GET["errorPseudoSup20"])) { // Vérification pseudo inférieur a 20 carac
                echo '<p style="color:red;text-align: center;">Pseudo supérieur à 20 caractères</p>';
            } elseif (isset($_GET["errorPseudoNotSet"])) { //
                echo '<p style="color:red;text-align: center;">Aucun pseudo spécifié</p>';
            } elseif (isset($_GET["messageSent"])) {
                echo '<p style="color:green;text-align: center;">Message envoyé</p>';
            }
            if (!isset($_SESSION["pseudo"])) {// Si aucun pseudo utilisateur entre pseudo?>
        <form action="functions/setPseudo.php" method="post" id="formPseudo">
            <label for="pseudo">Pseudo: </label>
            <input type="text" name="pseudo" id="">
            <input type="submit" value="Envoyer">
        </form>
        <?php } else { // Sinon affiche pseudo
            echo "<p id='pseudoConnected'> Connecté: " . htmlspecialchars($_SESSION["pseudo"]) . "</p>";
        ?>
        <input type='submit' value='Changer de pseudo' id="buttonChangePseudo" onclick="window.location='functions/unsetPseudo.php'">
        <?php }?>
        <div id="chat">
            <?php
                include "functions/bdd.php"; // inclue la BDD
                $query = $bdd->query("SELECT * FROM messages"); // Selectionne tout de messages
                $donnees = $query->fetchAll(); // Recupere toute les données et met dans un tableau
                foreach ($donnees as $value) { // Parcours le tableau
            ?>
            <div class="messageFromChat">
            <?php echo "<p><span class='pseudoFromChat'>" . htmlspecialchars($value["sendByUser"]) . ": </span>" . htmlspecialchars($value["content"]) . "</p>" // Affiche, Pseudo: message ?>
            <?php echo "<p id='dateAndHourChat'>" . $value["date"] . " à " . $value["hour"] . "</p>" // Affiche, 09/07/2019 à 1:00 ?>
                <hr>
            </div>
                <?php }?>
        </div>
        <form action="functions/addMessage.php" method="post" id="formMessage">
            <textarea name="message" id="" cols="30" rows="5"></textarea>
            <input id="buttonMessage" type="submit" value="Envoyer">
        </form>
    </div>
    <script>
        var messageBody = document.querySelector('#chat');
        messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
    </script>
</body>

</html>
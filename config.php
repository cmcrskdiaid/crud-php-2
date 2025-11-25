<?php
$host = "192.168.44.131";   // adresse IP du serveur MySQL
$user = "appuser";         // utilisateur MySQL dédié
$pass = "motdepasse";      // mot de passe de l'utilisateur
$db   = "entreprise";      // nom de la base de données

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

?>

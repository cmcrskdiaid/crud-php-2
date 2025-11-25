<?php
include 'config.php';

if (isset($_GET['matricule'])) {
    $matricule = intval($_GET['matricule']);
    $conn->query("DELETE FROM employes WHERE matricule=$matricule");
}

// Après suppression, retour à la liste
header("Location: index.php");
exit;
?>
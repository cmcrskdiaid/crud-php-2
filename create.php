<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $age = intval($_POST['age']);
    $department = $_POST['department'];
    $poste = $_POST['poste'];
    $email = $_POST['email'];

    $sql = "INSERT INTO employes (prenom, nom, age, department, poste, email)
            VALUES ('$prenom', '$nom', $age, '$department', '$poste', '$email')";
    $conn->query($sql);
    header("Location: index.php");
    exit;
}
// ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Employé</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Ajouter un Employé</h1>
    <form method="post">
        Prénom: <input type="text" name="prenom" required><br><br>
        Nom: <input type="text" name="nom" required><br><br>
        Âge: <input type="number" name="age" required><br><br>
        Département: <input type="text" name="department" required><br><br>
        Poste: <input type="text" name="poste" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        <button type="submit">Enregistrer</button>
    </form>
</body>

</html>

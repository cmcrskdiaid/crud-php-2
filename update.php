<?php
include 'config.php';

$matricule = intval($_GET['matricule']);
$result = $conn->query("SELECT * FROM employes WHERE matricule=$matricule");
$employe = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $age = intval($_POST['age']);
    $department = $_POST['department'];
    $poste = $_POST['poste'];
    $email = $_POST['email'];

    $sql = "UPDATE employes SET prenom='$prenom', nom='$nom', age=$age,
            department='$department', poste='$poste', email='$email'
            WHERE matricule=$matricule";
    $conn->query($sql);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier Employé</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Modifier Employé</h1>
    <form method="post">
        Prénom: <input type="text" name="prenom" value="<?= $employe['prenom'] ?>" required><br><br>
        Nom: <input type="text" name="nom" value="<?= $employe['nom'] ?>" required><br><br>
        Âge: <input type="number" name="age" value="<?= $employe['age'] ?>" required><br><br>
        Département: <input type="text" name="department" value="<?= $employe['department'] ?>" required><br><br>
        Poste: <input type="text" name="poste" value="<?= $employe['poste'] ?>" required><br><br>
        Email: <input type="email" name="email" value="<?= $employe['email'] ?>" required><br><br>
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
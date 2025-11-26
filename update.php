<?php
include 'config.php';

$matricule = intval($_GET['matricule']);
$result = $conn->query("SELECT * FROM employes WHERE matricule=$matricule");
$employe = $result ? $result->fetch_assoc() : null;

if (!$employe) {
    die("Employé introuvable");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prenom     = trim($_POST['prenom']);
    $nom        = trim($_POST['nom']);
    $age        = intval($_POST['age']);
    $department = trim($_POST['department']);
    $poste      = trim($_POST['poste']);
    $email      = trim($_POST['email']);

    $stmt = $conn->prepare("UPDATE employes 
                            SET prenom=?, nom=?, age=?, department=?, poste=?, email=? 
                            WHERE matricule=?");
    $stmt->bind_param("ssisssi", $prenom, $nom, $age, $department, $poste, $email, $matricule);

    if (!$stmt->execute()) {
        die("Erreur SQL: " . $stmt->error);
    }

    $stmt->close();
    header("Location: https://crud-php-2.azurewebsites.net/index.php");
    exit;
}
// ?>
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
        Prénom: <input type="text" name="prenom" value="<?= htmlspecialchars($employe['prenom']) ?>" required><br><br>
        Nom: <input type="text" name="nom" value="<?= htmlspecialchars($employe['nom']) ?>" required><br><br>
        Âge: <input type="number" name="age" value="<?= htmlspecialchars($employe['age']) ?>" required><br><br>
        Département: <input type="text" name="department" value="<?= htmlspecialchars($employe['department']) ?>" required><br><br>
        Poste: <input type="text" name="poste" value="<?= htmlspecialchars($employe['poste']) ?>" required><br><br>
        Email: <input type="email" name="email" value="<?= htmlspecialchars($employe['email']) ?>" required><br><br>
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>




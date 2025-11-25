<?php
include 'config.php';

// Lecture des employés
$result = $conn->query("SELECT * FROM employes");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion des Employés</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Liste des Employés</h1>
    <a href="create.php">➕ Ajouter un employé</a>
    <table>
        <tr>
            <th>Matricule</th><th>Prénom</th><th>Nom</th><th>Âge</th>
            <th>Département</th><th>Poste</th><th>Email</th><th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['matricule'] ?></td>
            <td><?= $row['prenom'] ?></td>
            <td><?= $row['nom'] ?></td>
            <td><?= $row['age'] ?></td>
            <td><?= $row['department'] ?></td>
            <td><?= $row['poste'] ?></td>
            <td><?= $row['email'] ?></td>
            <td>
                <a href="update.php?matricule=<?= $row['matricule'] ?>">✏️ Modifier</a>
                <a href="delete.php?matricule=<?= $row['matricule'] ?>" onclick="return confirm('Supprimer cet employé ?')">🗑️ Supprimer</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
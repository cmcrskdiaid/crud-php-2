#!/bin/bash

# Variables de connexion MySQL (utilisateur root ou admin)
DB_ROOT_USER="root"        # adapte selon ton serveur
DB_ROOT_PASS=""            # mot de passe root MySQL si nécessaire
DB_HOST="localhost"

# Variables pour la base et l'utilisateur applicatif
DB_NAME="entreprise"
APP_USER="appuser"
APP_PASS="motdepasse"      # choisis un mot de passe fort

# Script SQL à exécuter
SQL_SCRIPT="
CREATE DATABASE IF NOT EXISTS $DB_NAME CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE $DB_NAME;
CREATE TABLE IF NOT EXISTS employes (
    matricule INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(50) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    age INT NOT NULL,
    department VARCHAR(100) NOT NULL,
    poste VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

-- Création de l'utilisateur dédié
CREATE USER IF NOT EXISTS '$APP_USER'@'%' IDENTIFIED BY '$APP_PASS';

-- Attribution des privilèges sur la base
GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$APP_USER'@'%';
FLUSH PRIVILEGES;
"

# Exécution du script SQL
sudo mysql -h $DB_HOST -u $DB_ROOT_USER -p$DB_ROOT_PASS -e "$SQL_SCRIPT"

# Vérification
if [ $? -eq 0 ]; then
    echo "Base de données '$DB_NAME', table 'employes' et utilisateur '$APP_USER' créés avec succès."
else
    echo "Erreur lors de la création de la base de données, de la table ou de l'utilisateur."
fi


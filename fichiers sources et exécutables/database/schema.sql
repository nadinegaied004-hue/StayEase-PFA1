-- StayEase Database Schema

CREATE DATABASE IF NOT EXISTS stayease;
USE stayease;

CREATE TABLE IF NOT EXISTS utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('client', 'proprietaire', 'admin') DEFAULT 'client',
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS logement (
    id_logement INT AUTO_INCREMENT PRIMARY KEY,
    id_proprietaire INT NOT NULL,
    description_logement TEXT,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_proprietaire) REFERENCES utilisateur(id)
);

CREATE TABLE IF NOT EXISTS attraction (
    id_attraction INT AUTO_INCREMENT PRIMARY KEY,
    nom_attraction VARCHAR(200) NOT NULL,
    distance FLOAT NOT NULL,
    id_logement INT NOT NULL,
    FOREIGN KEY (id_logement) REFERENCES logement(id_logement) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS evenement (
    id_evenement INT AUTO_INCREMENT PRIMARY KEY,
    nom_evenement VARCHAR(200) NOT NULL,
    date_evenement DATE NOT NULL,
    id_logement INT NOT NULL,
    FOREIGN KEY (id_logement) REFERENCES logement(id_logement) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS avis (
    id_avis INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT NOT NULL,
    id_logement INT NOT NULL,
    commentaire TEXT,
    note INT CHECK (note BETWEEN 1 AND 5),
    date_avis TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_client) REFERENCES utilisateur(id),
    FOREIGN KEY (id_logement) REFERENCES logement(id_logement)
);

CREATE TABLE IF NOT EXISTS reservation (
    id_reservation INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT NOT NULL,
    id_logement INT NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    statut ENUM('en_attente', 'acceptee', 'refusee', 'annulee') DEFAULT 'en_attente',
    date_reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_client) REFERENCES utilisateur(id),
    FOREIGN KEY (id_logement) REFERENCES logement(id_logement)
);

-- Sample data
INSERT INTO utilisateur (nom, prenom, email, mot_de_passe, role) VALUES
('Ben Amor', 'Ahmed', 'ahmed@example.com', 'password123', 'proprietaire'),
('Trabelsi', 'Sarra', 'sarra@example.com', 'password123', 'client');
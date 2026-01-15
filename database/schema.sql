-- database/schema.sql

-- 1. Base de données
CREATE DATABASE IF NOT EXISTS projet_ai_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE projet_ai_db;

-- 2. Nettoyage préalable (pour éviter les erreurs si on relance le script)
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS demandes_contact;
DROP TABLE IF EXISTS investisseur_interets;
DROP TABLE IF EXISTS profils_investisseurs;
DROP TABLE IF EXISTS profils_porteurs;
DROP TABLE IF EXISTS domaines_ia;
DROP TABLE IF EXISTS users;
SET FOREIGN_KEY_CHECKS = 1;

-- ==========================================
-- 3. TABLE UTILISATEURS (Auth)
-- ==========================================
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'porteur', 'investisseur') NOT NULL,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ==========================================
-- 4. TABLE DOMAINES IA (Catégories)
-- ==========================================
CREATE TABLE domaines_ia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT
) ENGINE=InnoDB;

-- ==========================================
[cite_start]-- 5. PROFILS PORTEURS [cite: 4]
-- ==========================================
CREATE TABLE profils_porteurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    nom_complet VARCHAR(100) NOT NULL,
    titre_projet VARCHAR(150) NOT NULL,
    stade ENUM('idée', 'prototype', 'early stage', 'scale-up') DEFAULT 'idée',
    domaine_id INT,
    description_courte TEXT,
    besoins TEXT,
    pitch_deck_path VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (domaine_id) REFERENCES domaines_ia(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- ==========================================
[cite_start]-- 6. PROFILS INVESTISSEURS [cite: 13]
-- ==========================================
CREATE TABLE profils_investisseurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    nom_complet VARCHAR(100) NOT NULL,
    type_investisseur ENUM('business_angel', 'vc', 'mentor', 'partenaire') DEFAULT 'business_angel',
    ticket_moyen VARCHAR(100),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ==========================================
[cite_start]-- 7. INTÉRÊTS INVESTISSEURS (Celle qui manquait !) [cite: 19]
-- ==========================================
CREATE TABLE investisseur_interets (
    investisseur_id INT NOT NULL,
    domaine_id INT NOT NULL,
    PRIMARY KEY (investisseur_id, domaine_id),
    FOREIGN KEY (investisseur_id) REFERENCES profils_investisseurs(id) ON DELETE CASCADE,
    FOREIGN KEY (domaine_id) REFERENCES domaines_ia(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ==========================================
[cite_start]-- 8. DEMANDES DE CONTACT (Celle qui manquait avant !) [cite: 32]
-- ==========================================
CREATE TABLE demandes_contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender_id INT NOT NULL,
    receiver_id INT NOT NULL,
    statut ENUM('en_attente', 'validé', 'refusé') DEFAULT 'en_attente',
    message_intro TEXT,
    date_demande DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (receiver_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;
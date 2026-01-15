-- Fichier : database/script.sql

-- 1. Création de la base de données (si elle n'existe pas)
CREATE DATABASE IF NOT EXISTS projet_ai_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE projet_ai_db;

-- 2. Nettoyage (Optionnel : supprime les tables existantes pour repartir à zéro)
DROP TABLE IF EXISTS demandes_contact;
DROP TABLE IF EXISTS investisseur_interets;
DROP TABLE IF EXISTS profils_investisseurs;
DROP TABLE IF EXISTS profils_porteurs;
DROP TABLE IF EXISTS domaines_ia;
DROP TABLE IF EXISTS users;

-- ==========================================
-- 3. TABLE UTILISATEURS
-- ==========================================
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'porteur', 'investisseur') NOT NULL,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ==========================================
-- 4. TABLE DOMAINES IA
-- ==========================================
CREATE TABLE domaines_ia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT
) ENGINE=InnoDB;

-- ==========================================
-- 5. PROFILS PORTEURS
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
-- 6. PROFILS INVESTISSEURS
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
-- 7. INSERTION DES DOMAINES (Données fixes)
-- ==========================================
INSERT INTO domaines_ia (nom, description) VALUES
('NLP & Chatbots', 'Traitement du langage naturel, GPT, traduction.'),
('Vision par Ordinateur', 'Reconnaissance d\'images, détection, médical.'),
('IA Générative', 'Création d\'images, vidéos, voix.'),
('Machine Learning', 'Analyse de données, prédictions.'),
('Robotique', 'Drones, robots autonomes.'),
('Santé / MedTech', 'IA appliquée à la médecine.'),
('FinTech', 'IA pour la finance.'),
('Autre', 'Projets tech hors IA.');
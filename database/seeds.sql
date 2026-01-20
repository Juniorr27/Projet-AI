-- database/seeds.sql

-- 1. Sélection de la base
USE projet_ai_db;

-- 2. Nettoyage (Méthode douce "DELETE" pour éviter l'erreur #1701)
SET FOREIGN_KEY_CHECKS = 0;

-- On vide les tables
DELETE FROM demandes_contact;
DELETE FROM investisseur_interets;
DELETE FROM profils_investisseurs;
DELETE FROM profils_porteurs;
DELETE FROM domaines_ia;
DELETE FROM users;

-- On remet les compteurs d'ID à 1 (pour que Alice soit toujours l'ID 1)
ALTER TABLE demandes_contact AUTO_INCREMENT = 1;
ALTER TABLE investisseur_interets AUTO_INCREMENT = 1;
ALTER TABLE profils_investisseurs AUTO_INCREMENT = 1;
ALTER TABLE profils_porteurs AUTO_INCREMENT = 1;
ALTER TABLE domaines_ia AUTO_INCREMENT = 1;
ALTER TABLE users AUTO_INCREMENT = 1;

SET FOREIGN_KEY_CHECKS = 1;

-- ==========================================
-- 3. INSERTION DES DONNÉES
-- ==========================================

-- Domaines IA
INSERT INTO domaines_ia (nom, description) VALUES
('NLP & Chatbots', 'Traitement du langage naturel, GPT, traduction.'),
('Vision par Ordinateur', 'Reconnaissance d\'images, détection, médical.'),
('IA Générative', 'Création d\'images, vidéos, voix.'),
('Machine Learning', 'Analyse de données, prédictions.'),
('Robotique', 'Drones, robots autonomes.'),
('Santé / MedTech', 'IA appliquée à la médecine.'),
('Autre', 'Projets tech hors IA.');

-- Utilisateurs de test
-- Note : Les mots de passe sont hashés (ici c'est "test" hashé pour l'exemple)
INSERT INTO users (id, email, password, role) VALUES 
(1, 'porteur@test.com', '$2y$10$abcdefghijk...', 'porteur'),
(2, 'invest@test.com', '$2y$10$abcdefghijk...', 'investisseur');

-- Profil Porteur (Alice)
INSERT INTO profils_porteurs (user_id, nom_complet, titre_projet, stade, domaine_id, description_courte) 
VALUES (1, 'Alice Dupont', 'MediScan AI', 'prototype', 2, 'Détection dermatologique par IA.');

-- Profil Investisseur (Bob)
INSERT INTO profils_investisseurs (id, user_id, nom_complet, type_investisseur, ticket_moyen)
VALUES (1, 2, 'Bob Shark', 'business_angel', '10k - 50k');

-- Bob est intéressé par la Vision par Ordinateur (Domaine 2)
INSERT INTO investisseur_interets (investisseur_id, domaine_id) VALUES (1, 2);
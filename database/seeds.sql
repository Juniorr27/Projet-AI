-- database/seeds.sql

-- 1. On sélectionne la bonne base
USE projet_ai_db;

-- 2. On vide les tables avant d'insérer (pour éviter les doublons si tu l'exécutes 2 fois)
-- On désactive temporairement la vérification des clés étrangères pour pouvoir vider dans n'importe quel ordre
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE demandes_contact;
TRUNCATE TABLE investisseur_interets;
TRUNCATE TABLE profils_investisseurs;
TRUNCATE TABLE profils_porteurs;
TRUNCATE TABLE domaines_ia;
TRUNCATE TABLE users;
SET FOREIGN_KEY_CHECKS = 1;

-- 3. On remet les données fixes (Domaines IA)
INSERT INTO domaines_ia (nom, description) VALUES
('NLP & Chatbots', 'Traitement du langage naturel, GPT, traduction.'),
('Vision par Ordinateur', 'Reconnaissance d\'images, détection, médical.'),
('IA Générative', 'Création d\'images, vidéos, voix.'),
('Machine Learning', 'Analyse de données, prédictions.'),
('Robotique', 'Drones, robots autonomes.'),
('Santé / MedTech', 'IA appliquée à la médecine.'),
('Autre', 'Projets tech hors IA.');

-- 4. Utilisateurs de test
INSERT INTO users (id, email, password, role) VALUES 
(1, 'porteur@test.com', '$2y$10$abcdefghijk...', 'porteur'),
(2, 'invest@test.com', '$2y$10$abcdefghijk...', 'investisseur');

-- 5. Profils associés
INSERT INTO profils_porteurs (user_id, nom_complet, titre_projet, stade, domaine_id, description_courte) 
VALUES (1, 'Alice Dupont', 'MediScan AI', 'prototype', 2, 'Détection dermatologique par IA.');

INSERT INTO profils_investisseurs (user_id, nom_complet, type_investisseur, ticket_moyen)
VALUES (2, 'Bob Shark', 'business_angel', '10k - 50k');
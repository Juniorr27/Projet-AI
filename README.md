# 🚀 Projet AI - Plateforme de Mise en Relation

**Projet AI** est une application web conçue pour connecter des porteurs de projets innovants dans le domaine de l'Intelligence Artificielle avec des investisseurs ciblés. 

Ce projet a été développé dans le cadre de la 2ème année de BUT Informatique, en utilisant une architecture **MVC (Modèle-Vue-Contrôleur)** construite sur-mesure en PHP ("from scratch").

---

## 🎯 Fonctionnalités Principales (MVP)

* ** Authentification par Rôles :** Inscription et connexion distinctes pour les "Porteurs de projets" et les "Investisseurs".
* ** Profils Personnalisés :** * Les porteurs peuvent présenter leur projet, leur stade d'avancement (Idée, Prototype, etc.) et uploader leur Pitch Deck (PDF).
    * Les investisseurs peuvent définir leur ticket moyen et leurs domaines IA de prédilection.
* ** Catalogue & Filtres :** Recherche dynamique de projets par domaine d'expertise IA (Machine Learning, NLP, Vision par Ordinateur...) et par stade de développement.
* ** Mise en relation :** Bouton d'action permettant aux investisseurs de manifester leur intérêt pour un projet, générant une demande de mise en contact.
* ** Tableaux de Bord :** Espaces privés dynamiques s'adaptant au rôle de l'utilisateur connecté.

---

## 🛠️ Stack Technique

* **Backend :** PHP (vanilla, Architecture MVC)
* **Base de Données :** MySQL (Connexion sécurisée via PDO)
* **Frontend :** HTML5, Tailwind CSS (via CDN)
* **Serveur local recommandé :** XAMPP / WAMP / MAMP

---

##  Architecture du Projet

Le projet respecte le patron de conception **MVC**, assurant une séparation claire entre la logique, les données et l'affichage :

```text
/Projet-AI
│
├── /config/         # Fichiers de configuration (connexion BDD)
├── /controllers/    # Logique métier (ex: AuthController, DashboardController)
├── /database/       # Scripts SQL pour la structure et les données de test
│   ├── schema.sql
│   └── seeds.sql
├── /models/         # Requêtes à la base de données (ex: UserModel)
├── /public/         # Point d'entrée de l'application (Document Root)
│   ├── /css, /img   # Assets publics
│   └── index.php    # Routeur principal
└── /views/          # Fichiers d'affichage HTML/PHP (layout, auth, dashboard...)

Kiala Junior Lombo - Développement Backend & Frontend - Étudiant en BUT Informatique (2ème année)

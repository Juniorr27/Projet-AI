<?php
// public/index.php

// On démarre la session pour gérer les futurs utilisateurs connectés
session_start();

// Routage simple
// Si l'URL est index.php?page=inscription, on va vers le contrôleur d'inscription
// Sinon, par défaut, on va vers l'accueil

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch($page) {
    case 'home':
        require '../controllers/HomeController.php';
        break;
    case 'inscription':
        // require '../controllers/InscriptionController.php'; (A créer plus tard)
        echo "Page d'inscription à venir...";
        break;
    default:
        require '../controllers/HomeController.php';
        break;
}
?>
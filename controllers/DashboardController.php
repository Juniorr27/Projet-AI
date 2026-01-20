<?php
// controllers/DashboardController.php

class DashboardController {

    public function index() {
        // 1. SÉCURITÉ : On vérifie si l'utilisateur est connecté
        if (!isset($_SESSION['user_id'])) {
            header('Location: login');
            exit;
        }

        // 2. On récupère les infos de session pour les afficher
        $nom = $_SESSION['nom'] ?? 'Utilisateur'; // Le '??' met une valeur par défaut si vide
        $role = $_SESSION['role'];

        // 3. On affiche la vue
        ob_start();
        require __DIR__ . '/../views/dashboard/index.php';
        $content = ob_get_clean();

        require __DIR__ . '/../views/layout.php';
    }
}
?>
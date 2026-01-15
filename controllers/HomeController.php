<?php
// controllers/HomeController.php

// On charge le modèle (si l'autoloader ne le fait pas encore)
require_once __DIR__ . '/../models/ProjectModel.php';

class HomeController {
    
    public function index() {
        // 1. Instancier le modèle
        $model = new ProjectModel();

        // 2. Récupérer les données (Filtres)
        $filterDomaine = isset($_GET['domaine']) ? $_GET['domaine'] : null;

        $domaines_list = $model->getAllDomaines();
        $projets_list = $model->getProjects($filterDomaine);

        // 3. Préparer l'affichage
        // On stocke la vue spécifique (home) dans une variable
        ob_start();
        require __DIR__ . '/../views/home.php';
        $content = ob_get_clean();

        // 4. Afficher le layout principal avec le contenu dedans
        require __DIR__ . '/../views/layout.php';
    }
}
?>
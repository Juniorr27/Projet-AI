<?php
// public/autoload.php

/**
 * L'Autoloader Maison
 * Cette fonction est appelée automatiquement par PHP dès que tu fais "new MaClasse()"
 * et qu'il ne connait pas encore "MaClasse".
 */
spl_autoload_register(function ($class_name) {
    
    $dirs = [
        '../controllers/',
        '../models/',
        '../classes/', 
    ];

    // On boucle sur chaque dossier pour voir si le fichier existe
    foreach ($dirs as $dir) {
        $file = $dir . $class_name . '.php';
        
        if (file_exists($file)) {
            require_once $file;
            return; 
        }
    }
});
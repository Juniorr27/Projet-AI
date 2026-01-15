<?php
// public/index.php

// 1. Initialisation
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

// On charge l'autoloader (l'assistant qu'on a créé juste avant)
require 'autoload.php'; 

// --- GESTION DE LA CONFIGURATION (BDD) ---
// Si tu as créé le fichier .env, ce bloc va charger tes mots de passe
if(file_exists(__DIR__ . '/.env')) {
    $env = parse_ini_file(__DIR__ . '/.env');
    define('DB_HOST', $env['DB_HOST']);
    define('DB_NAME', $env['DB_NAME']);
    define('DB_USER', $env['DB_USER']);
    define('DB_PASS', $env['DB_PASS']);
} else {
    // Si le fichier .env n'existe pas, on met des valeurs par défaut pour que ça ne plante pas
    // C'est utile pour WAMP/XAMPP
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'projet_ai_db');
    define('DB_USER', 'root');
    define('DB_PASS', '');
}

// --- LA CLASSE ROUTER ---
class Router {
    private $routes = [];
    private $prefix;

    public function __construct($prefix = '') {
        $this->prefix = trim($prefix, '/');
    }

    public function addRoute($uri, $controllerMethod) {
        $this->routes[trim($uri, '/')] = $controllerMethod;
    }

    public function route($url) {
        $url = parse_url($url, PHP_URL_PATH);

        // Gestion des sous-dossiers (localhost/mon-projet/...)
        if ($this->prefix && strpos($url, '/' . $this->prefix) === 0) {
            $url = substr($url, strlen($this->prefix) + 1);
        }

        $url = trim($url, '/');

        foreach ($this->routes as $route => $controllerMethod) {
            $routeParts = explode('/', $route);
            $urlParts = explode('/', $url);

            if (count($routeParts) === count($urlParts)) {
                $params = [];
                $isMatch = true;

                foreach ($routeParts as $index => $part) {
                    if (preg_match('/^{\w+}$/', $part)) {
                        $params[] = $urlParts[$index]; // C'est un paramètre {id}
                    } elseif ($part !== $urlParts[$index]) {
                        $isMatch = false;
                        break;
                    }
                }

                if ($isMatch) {
                    list($controllerName, $methodName) = explode('@', $controllerMethod);
                    
                    // Vérification que le contrôleur existe bien
                    if (class_exists($controllerName)) {
                        $controller = new $controllerName();
                        if (method_exists($controller, $methodName)) {
                            // Lancement de la méthode (ex: HomeController->index())
                            call_user_func_array([$controller, $methodName], $params);
                            return; 
                        } else {
                            die("Erreur : Méthode $methodName introuvable dans $controllerName");
                        }
                    } else {
                        // Astuce : Vérifie bien que le fichier s'appelle HomeController.php
                        // et qu'il est dans le dossier controllers/
                        die("Erreur : Contrôleur $controllerName introuvable.");
                    }
                }
            }
        }
        
        // 404 - Route non trouvée
        echo "<div style='font-family:sans-serif; text-align:center; margin-top:50px;'>";
        echo "<h1 style='color:#e74c3c;'>⚠️ Erreur 404</h1>";
        echo "<p>Aucune route ne correspond à l'URL : <strong>/$url</strong></p>";
        echo "</div>";
    }
}

// --- CONFIGURATION DU ROUTAGE ---

// Calcul automatique du dossier du projet
$scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME']);
$dossier_projet = dirname($scriptName);

$router = new Router($dossier_projet);

// === TES ROUTES POUR PROJET X ===

// Accueil
$router->addRoute('', 'HomeController@index');      
$router->addRoute('home', 'HomeController@index');  

// Authentification
$router->addRoute('login', 'AuthController@login');
$router->addRoute('register', 'AuthController@register');
$router->addRoute('logout', 'AuthController@logout');

// Espace Membre
$router->addRoute('dashboard', 'AuthController@dashboard'); 

// Catalogue et Détails
$router->addRoute('projets', 'ProjectController@index'); 
$router->addRoute('projet/{id}', 'ProjectController@show'); // Ex: projet/12

// --- LANCEMENT ---
$router->route($_SERVER['REQUEST_URI']);
?>
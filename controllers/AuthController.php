<?php
// controllers/AuthController.php

// On charge le modèle User
require_once __DIR__ . '/../models/UserModel.php';

class AuthController {

    public function register() {
        
        // TRAITEMENT DU FORMULAIRE (POST)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // 1. Récupération des champs
            $role = $_POST['role'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $nom = $_POST['nom_complet'];
            
            // 2. Initialisation du modèle
            $userModel = new UserModel();

            // 3. Création de l'utilisateur principal (User Story 1.2)
            $userId = $userModel->createUser($email, $password, $role);

            if ($userId) {
                // Si l'utilisateur est bien créé, on crée son profil spécifique
                
                if ($role === 'porteur') {
                    // User Story 1.3
                    $titre_projet = $_POST['titre_projet'];
                    $userModel->createPorteur($userId, $nom, $titre_projet);
                } 
                elseif ($role === 'investisseur') {
                    // User Story 1.4
                    $ticket = $_POST['ticket_moyen'];
                    $userModel->createInvestisseur($userId, $nom, $ticket);
                }

                // 4. Connexion automatique après inscription
                $_SESSION['user_id'] = $userId;
                $_SESSION['role'] = $role;
                $_SESSION['nom'] = $nom;

                // 5. Redirection vers l'accueil (ou dashboard plus tard)
                header('Location: home');
                exit;

            } else {
                // Erreur (ex: email déjà pris)
                $error = "Cet email est déjà utilisé.";
                require __DIR__ . '/../views/auth/register.php';
            }
            return;
        }

        // AFFICHAGE DU FORMULAIRE (GET)
        require __DIR__ . '/../views/auth/register.php';
    }

  

    public function login() {
        // TRAITEMENT (POST)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new UserModel();
            $user = $userModel->login($_POST['email'], $_POST['password']);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['nom'] = $user['nom_complet'] ?? 'Membre'; // (Optionnel) pour l'accueil
                
                header('Location: home'); 
                exit;
            } else {
                $error = "Email ou mot de passe incorrect.";
                // On charge la vue DIRECTEMENT (sans layout)
                require __DIR__ . '/../views/auth/login.php';
            }
        } 
        // AFFICHAGE (GET)
        else {
            // On charge la vue DIRECTEMENT (sans layout)
            // C'est ça qui enlève le header et le footer !
            require __DIR__ . '/../views/auth/login.php';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: home');
        exit;
    }
}
?>
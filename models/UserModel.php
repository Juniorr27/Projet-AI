<?php
// models/UserModel.php

class UserModel {
    private $pdo;

    public function __construct() {
        // Connexion à la BDD (identique à ProjectModel)
        $host = defined('DB_HOST') ? DB_HOST : 'localhost';
        $dbname = defined('DB_NAME') ? DB_NAME : 'projet_ai_db';
        $user = defined('DB_USER') ? DB_USER : 'root';
        $pass = defined('DB_PASS') ? DB_PASS : '';

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Erreur Model User : " . $e->getMessage());
        }
    }

    // 1. Créer le compte de base (Table users)
    public function createUser($email, $password, $role) {
        // Hashage du mot de passe (Indispensable pour la sécurité !)
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (email, password, role) VALUES (:email, :pass, :role)";
        $stmt = $this->pdo->prepare($sql);
        
        try {
            $stmt->execute(['email' => $email, 'pass' => $hash, 'role' => $role]);
            return $this->pdo->lastInsertId(); // On retourne l'ID du nouvel inscrit
        } catch (PDOException $e) {
            // Gestion des doublons d'email
            if ($e->getCode() == 23000) {
                return false; // L'email existe déjà
            }
            throw $e;
        }
    }

    // 2. Créer le profil Porteur (Table profils_porteurs)
    public function createPorteur($user_id, $nom, $projet) {
        $sql = "INSERT INTO profils_porteurs (user_id, nom_complet, titre_projet) VALUES (:uid, :nom, :titre)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['uid' => $user_id, 'nom' => $nom, 'titre' => $projet]);
    }

    // 3. Créer le profil Investisseur (Table profils_investisseurs)
    public function createInvestisseur($user_id, $nom, $ticket) {
        $sql = "INSERT INTO profils_investisseurs (user_id, nom_complet, ticket_moyen) VALUES (:uid, :nom, :ticket)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['uid' => $user_id, 'nom' => $nom, 'ticket' => $ticket]);
    }
    
    // 4. Vérifier la connexion (pour plus tard)
    public function login($email, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
?>
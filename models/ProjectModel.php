<?php
// models/ProjectModel.php

class ProjectModel {
    private $pdo;

    public function __construct() {
        // On récupère la connexion BDD définie dans config/database.php ou via global
        // Pour faire simple ici, on refait une connexion ou on utilise l'existante
        $host = defined('DB_HOST') ? DB_HOST : 'localhost';
        $dbname = defined('DB_NAME') ? DB_NAME : 'projet_ai_db';
        $user = defined('DB_USER') ? DB_USER : 'root';
        $pass = defined('DB_PASS') ? DB_PASS : '';

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Erreur Model : " . $e->getMessage());
        }
    }

    public function getAllDomaines() {
        $stmt = $this->pdo->query("SELECT * FROM domaines_ia ORDER BY nom ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProjects($domaine_id = null) {
        $sql = "SELECT p.*, d.nom as nom_domaine 
                FROM profils_porteurs p
                LEFT JOIN domaines_ia d ON p.domaine_id = d.id
                WHERE 1=1";
        
        $params = [];
        if ($domaine_id) {
            $sql .= " AND p.domaine_id = :domaine";
            $params['domaine'] = $domaine_id;
        }
        
        $sql .= " ORDER BY p.id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
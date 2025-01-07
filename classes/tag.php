<?php

    require_once '../config/db.php';
    class Tag {
        private $id;
        private $nom;

        private $database;

        public function __construct() {
            $this->database = new Database();
        }

        // Getters
        public function getId() {
            return $this->id;
        }
        public function getNom() {
            return $this->nom;
        }

        // Setters
        public function setId($id) {
            $this->id = $id;
        }

        public function setNom($nom) {
            $this->nom = $nom;
        }

        // SHOW ALL TAGS
        public function allTags() {
            try {
                $sql = "SELECT * FROM tags";
                $stmt = $this->database->getConnection()->prepare($sql);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $result;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                return "Erreur lors de la Récupération des Commentaires". $e->getMessage();
            }
        }
    }
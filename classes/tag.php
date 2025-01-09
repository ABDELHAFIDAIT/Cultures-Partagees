<?php

    require_once __DIR__ . './../config/db.php';
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

        public function getDatabase() {
            return $this->database;
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
                $sql = "SELECT T.id_tag, T.nom_tag , COUNT(TA.id_article) AS nbr_articles FROM tags T LEFT JOIN article_tag TA ON T.id_tag = TA.id_tag GROUP BY T.id_tag ORDER BY nbr_articles DESC";
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

        // SHOW ONE TAG
        public function showTag(int $id){
            try{
                $query = "SELECT * FROM tags WHERE id_tag = :id";
                $stmt = $this->database->getConnection()->prepare($query);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $result;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                return "". $e->getMessage();
            }
        }

        // ASSIGN TAG TO ARTICLE
        public function assignTag(int $id_tag, int $id_article){
            try{
                $query = "INSERT INTO article_tag(id_tag , id_article) VALUES (:id_tag , :id_article)";
                $stmt = $this->database->getConnection()->prepare($query);
                $stmt->bindParam(":id_tag", $id_tag, PDO::PARAM_INT);
                $stmt->bindParam(":id_article", $id_article, PDO::PARAM_INT);
                $stmt->execute();
            }catch(PDOException $e){
                return "Erreur lors de l'insertion dans la Table article_tag". $e->getMessage();
            }
        }
    }
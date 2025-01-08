<?php

    require_once __DIR__ . './../config/db.php';
    class Comment {
        private $id;
        private $content;
        private $date;

        private $database;

        public function __construct() {
            $this->database = new Database();
        }

        // Getters
        public function getId() {
            return $this->id;
        }
        public function getContent() {
            return $this->content;
        }

        public function getCreatedAt() {
            return $this->date;
        }

        // Setters
        public function setId($id) {
            $this->id = $id;
        }

        public function setContent($content) {
            $this->content = $content;
        }

        public function setCreatedAt($date) {
            $this->date = $date;
        }

        // SHOW ALL COMMENTS
        public function statusComments(int $etat) {
            try {
                $sql = "SELECT C.contenu AS comment, C.id_comment, C.date_soumission, C.isApproved , CONCAT(US.prenom, ' ' , US.prenom) AS auteur, CONCAT(U.prenom, ' ' , U.prenom) AS utilisateur, A.titre
                        FROM users U JOIN commentaires C ON U.id_user = C.id_utilisateur 
                                    JOIN article A ON C.id_article = A.id_article 
                                    JOIN users US ON A.id_auteur = US.id_user
                        WHERE C.isApproved = :etat";

                $stmt = $this->database->getConnection()->prepare($sql);
                $stmt->bindParam(":etat", $etat, PDO::PARAM_INT);
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

        // SHOW ONE COMMENT
        public function showComment(int $id){
            try{
                $query = "SELECT * FROM users U JOIN commentaires C ON U.id_user = C.id_utilisateur JOIN article A ON C.id_article = A.id_article WHERE id_comment = :id";
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

        // DISTRIBUTE COMMENTS ON USER
        public function distributeComments($id){
            try{
                $query = "SELECT A.titre, COUNT(A.id_comment) AS nbr_comments FROM article A JOIN commentaires C ON A.id_article = C.id_article WHERE A.id_utilisateur = :id GROUP BY C.titre ORDER BY nbr_comments DESC";
                $stmt = $this->database->getConnection()->prepare($query);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $result;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                return "Erreur lors de Récupération des Données : ". $e->getMessage();
            }
        }
    }
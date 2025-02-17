<?php

    require_once __DIR__ .'./../config/db.php';

    class Article{
        private int $id;
        private string $title;
        private string $content;
        private string $date_pub;
        private $database;

        // CONSTRUCTOR
        public function __construct(){
            $this->database= new Database();
        }

        // GETTERS
        public function getId(){
            return $this->id;
        }
        public function getTitle(){
            return $this->title;
        }
        public function getContent(){
            return $this->content;
        }
        public function getDate(){
            return $this->date_pub;
        }


        // SETTERS
        public function setId(int $id){
            $this->id = $id;
        }
        public function setTitle(string $title){
            $this->title = $title;
        }
        public function setContent(string $content){
            $this->content = $content;
        }
        public function setDate(string $date){
            $this->date_pub = $date;
        }


        // SHOW ALL ARTICLES
        public function allArticles(){
            try{
                $query = "SELECT * FROM article A JOIN categorie C ON A.id_categorie = C.id_categorie
                        JOIN users U ON U.id_user = A.id_auteur WHERE A.statut = :statut ORDER BY A.date_publication DESC";
                $stmt = $this->database->getConnection()->prepare($query);
                $stmt->bindValue(":statut", 'Accepté', PDO::PARAM_STR);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $result;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                return "Erreur lors de la Récupération des Articles". $e->getMessage();
            }
        }

        // SHOW REFUSED ARTICLES
        public function refusedArticles(){
            try{
                $query = "SELECT * FROM article A JOIN categorie C ON A.id_categorie = C.id_categorie
                        JOIN users U ON U.id_user = A.id_auteur WHERE A.statut = :statut ORDER BY A.date_publication DESC";
                $stmt = $this->database->getConnection()->prepare($query);
                $stmt->bindValue(":statut", 'Refusé', PDO::PARAM_STR);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $result;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                return "Erreur lors de la Récupération des Articles". $e->getMessage();
            }
        }

        // SHOW REFUSED ARTICLES
        public function pendingArticles(){
            try{
                $query = "SELECT * FROM article A JOIN categorie C ON A.id_categorie = C.id_categorie
                        JOIN users U ON U.id_user = A.id_auteur WHERE A.statut = :statut ORDER BY A.date_publication DESC";
                $stmt = $this->database->getConnection()->prepare($query);
                $stmt->bindValue(":statut", 'En Attente', PDO::PARAM_STR);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $result;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                return "Erreur lors de la Récupération des Articles". $e->getMessage();
            }
        }

        // SHOW ONE ARTICLE
        public function showArticle(int $id){
            try{
                $query = "SELECT * FROM article A JOIN users U ON A.id_auteur = U.id_user JOIN categorie C ON A.id_categorie = C.id_categorie WHERE A.id_article = :id AND A.statut = :statut";
                $stmt = $this->database->getConnection()->prepare($query);
                $stmt->bindValue(":id", (int)$id, PDO::PARAM_INT);
                $stmt->bindValue(":statut", 'Accepté', PDO::PARAM_STR);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $result;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                return "Erreur lors de la Récupération de l'Article". $e->getMessage();
            }
        }

        // COUNT ARTICLES OF A SPECIFIC AUTHOR
        public function countArticles(int $id_auteur){
            try{
                $query = "SELECT COUNT(id_article) AS nbr_articles FROM article WHERE id_auteur = :id";
                $stmt = $this->database->getConnection()->prepare($query);
                $stmt->bindValue(":id", (int)$id_auteur, PDO::PARAM_INT);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $result;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                return "Erreur lors de la Récupération de Nombre d'Article". $e->getMessage();
            }
        }

        // COUNT ARTICLES OF A SPECIFIC AUTHOR BASING ON STATUS 
        public function statusArticles(int $id_auteur, string $statut){
            try{
                $query = "SELECT COUNT(id_article) AS nbr_articles FROM article WHERE id_auteur = :id AND statut = :statut";
                $stmt = $this->database->getConnection()->prepare($query);
                $stmt->bindParam(":id", $id_auteur, PDO::PARAM_INT);
                $stmt->bindParam(":statut", $statut, PDO::PARAM_STR);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $result;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                return "Erreur lors de la Récupération de Nombre d'Article". $e->getMessage();
            }
        }

        // SHOW ONE ARTICLE
        public function getArticle(int $id){
            try{
                $query = "SELECT * FROM article A JOIN users U ON A.id_auteur = U.id_user JOIN categorie C ON A.id_categorie = C.id_categorie WHERE A.id_article = :id";
                $stmt = $this->database->getConnection()->prepare($query);
                $stmt->bindValue(":id", (int)$id, PDO::PARAM_INT);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $result;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                return "Erreur lors de la Récupération de l'Article". $e->getMessage();
            }
        }

        //SHOW LAST ARTICLE
        public function lastArticle(){
            try{
                $query = "SELECT id_article FROM article ORDER BY id_article DESC LIMIT 1";
                $stmt = $this->database->getConnection()->prepare($query);
                $stmt->execute();
                $result = $stmt->fetchColumn();
                return $result;
            }catch(PDOException $e){
                return "Erreur Lors de Récupération de l'ID Article". $e->getMessage();
            }
        }
    }
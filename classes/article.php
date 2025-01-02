<?php

    require_once '../config/db.php';

    class Article{
        private int $id;
        private string $title;
        private string $content;
        private string $date_pub;
        private $database;

        // CONSTRUCTOR
        public function __construct(){
            $this->database= new Database();;
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
                $query = "SELECT * FROM articles";
                $stmt = $this->database->getConnection()->prepare($query);
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
                $query = "SELECT * FROM articles WHERE id_article = :id";
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
    }
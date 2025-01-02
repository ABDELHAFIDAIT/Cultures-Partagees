<?php

    require_once '../config/db.php';

    class Article{
        private $id;
        private $title;
        private $content;
        private $date_pub;
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
        public function setId($id){
            $this->id = $id;
        }
        public function setTitle($title){
            $this->title = $title;
        }
        public function setContent($content){
            $this->content = $content;
        }
        public function setDate($date){
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
    }
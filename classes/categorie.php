<?php

    include_once __DIR__ .'./../config/db.php';

    class Categorie{
        private int $id;
        private string $name;
        private string $description;
        private string $date;
        private $database;

        // CONSTROCTOR
        public function __construct(){
            $this->database = new Database();
        }


        // GETTERS
        public function getId(): int{
            return $this->id;
        }
        public function getName(): string{
            return $this->name;
        }
        public function getDescription(): string{
            return $this->description;
        }
        public function getDate(): string{
            return $this->date;
        }


        // SETTERS
        public function setId(int $id){
            $this->id = $id;
        }
        public function setName(string $name){
            $this->name = $name;
        }
        public function setDescription(string $description){
            $this->description = $description;
        }
        public function setDate(string $date){
            $this->date = $date;
        }



        // SHOW ALL CATEGORIES
        public function allCategories(){
            try{
                $query = "SELECT * FROM categorie";
                $stmt = $this->database->getConnection()->prepare($query);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $result;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                return "Erreur lors de la Récupération des Catégories". $e->getMessage();
            }
        }


        // SHOW ONE CATEGORY
        public function showCategorie(int $id){
            try{
                $query = "SELECT * FROM categorie WHERE id_categorie = :id";
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


        // DISTRIBUTE ARTICLES BY CATEGORIES
        public function distributeCategories($id_auteur){
            try{
                $query = "SELECT C.nom_categorie, COUNT(A.id_article) AS nbr_articles FROM article A JOIN categorie C ON A.id_categorie = C.id_categorie WHERE A.id_auteur = :id GROUP BY C.nom_categorie ORDER BY nbr_articles DESC";
                $stmt = $this->database->getConnection()->prepare($query);
                $stmt->bindParam(":id", $id_auteur, PDO::PARAM_INT);
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
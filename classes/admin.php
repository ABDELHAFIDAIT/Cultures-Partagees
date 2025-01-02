<?php

    require_once './user.php';

    class Admin extends User{

        // ADD CATEGORIE METHOD
        public function addCategorie(int $id_admin, string $nom, string $description){
            try {
                $sql = "INSERT INTO categorie (id_admin, nom_categorie, description) VALUES (:id_admin, :nom, :description)";
                $stmt = $this->database->getConnection()->prepare($sql);
                $stmt->bindParam(":id_admin", $id_admin, PDO::PARAM_INT);
                $stmt->bindParam(":nom", $nom, PDO::PARAM_STR);
                $stmt->bindParam(":description", $description, PDO::PARAM_STR);
                $stmt->execute();
                header("location: ../views/admin/dashboard.php");
            } catch (PDOException $e) {
                return "Erreur lors de l'ajout de la catégorie : " . $e->getMessage();
            }
        }

        // MODIFY CATEGORIE METHOD
        public function editCategorie(int $id, string $nom, string $description){
            try {
                $sql = "UPDATE categorie SET description = :description AND  nom_categorie = :nom WHERE id_categorie = :id";
                $stmt = $this->database->getConnection()->prepare($sql);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->bindParam(":nom", $nom, PDO::PARAM_STR);
                $stmt->bindParam("description", $description, PDO::PARAM_STR);
                $stmt->execute();
                header("location: ../views/admin/dashboard.php");
            } catch (PDOException $e) {
                return "Erreur lors de Modification de la catégorie :". $e->getMessage();
            }
        }

        // DELETE CATEGORIE METHOD
        public function deleteCategorie(int $id){
            try {
                $sql = "DELETE FROM categorie WHERE id_categorie = :id";
                $stmt = $this->database->getConnection()->prepare($sql);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();
                header("location: ../views/admin/dashboard.php");
            } catch (PDOException $e) {
                return "Erreur lors de la suppression de la catégorie : " . $e->getMessage();
            }
        }

        // APPROVE ARTICLE METHOD
        public function approveArticle($id_article){
            try {
                $sql = "UPDATE article SET etat = 'Accepté' WHERE id_article = :id";
                $stmt = $this->database->getConnection()->prepare($sql);
                $stmt->bindParam(":id", $id_article, PDO::PARAM_INT);
                $stmt->execute();
                header("location: ../views/admin/dashboard.php");
            } catch (PDOException $e) {
                return "Erreur lors de la confirmation d'Article : ". $e->getMessage();
            }
        }

    }
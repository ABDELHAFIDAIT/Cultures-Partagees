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

    }
<?php

    require_once __DIR__ .'./user.php';

    class Admin extends User{

        // SHOW ALL CATEGORIES METHOD
        public function showCategories(){
            try {
                $sql = "SELECT C.nom_categorie, C.id_categorie, C.description , COUNT(A.id_article) AS nbr_articles FROM categorie C LEFT JOIN article A ON C.id_categorie = A.id_categorie GROUP BY C.id_categorie";
                $stmt = $this->database->getConnection()->prepare($sql);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $categories;
                }else{
                    return "Aucune catégorie trouvée";
                }
            } catch (PDOException $e) {
                return "Erreur lors de l'affichage des catégories : " . $e->getMessage();
            }
        }

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

        // REJECT ARTICLE METHOD
        public function rejectArticle(int $id_article){
            try {
                $sql = "UPDATE article SET etat = 'Refusé' WHERE id_article = :id";
                $stmt = $this->database->getConnection()->prepare($sql);
                $stmt->bindParam(":id", $id_article, PDO::PARAM_INT);
                $stmt->execute();
                header("location: ../views/admin/dashboard.php");
            } catch (PDOException $e) {
                return "Erreur lors de la Refuse d'Article : ". $e->getMessage();
            }
        }

    }
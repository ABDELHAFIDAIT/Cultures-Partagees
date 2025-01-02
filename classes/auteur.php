<?php

    require_once './utilisateur.php';

    class Auteur extends Utilisateur{

        // ADD ARTICLE METHOD
        public function addArticle(string $titre , string $contenu, int $id_auteur, int $id_categorie){
            try{
                $sql = 'INSERT INTO article (titre, contenu, id_auteur, id_categorie) VALUES (:titre, :contenu, :id_auteur, :id_categorie)';
                $stmt = $this->database->getConnection()->prepare($sql);
                $stmt->bindParam(":titre", $titre, PDO::PARAM_STR);
                $stmt->bindParam(":titre", $titre, PDO::PARAM_STR);
                $stmt->bindParam(":id_auteur", $id_auteur, PDO::PARAM_INT);
                $stmt->bindParam(":id_categorie", $id_categorie, PDO::PARAM_INT);
                $stmt->execute();
                header("location: ../views/admin/dashboard.php");
            } catch (PDOException $e) {
                return "Erreur lors de l'ajout de l'Article : " . $e->getMessage();
            }
        }


        // MODIFY ARTICLE METHOD
        public function editArticle(int $id_article, string $titre , string $contenu, int $id_categorie){
            try{
                $sql = "UPDATE article SET titre = :titre, contenu = :contenu, id_categorie = :id_categorie WHERE id_article = :id_article";
                $stmt = $this->database->getConnection()->prepare($sql);
                $stmt->bindParam(":titre", $titre, PDO::PARAM_STR);
                $stmt->bindParam(":contenu", $contenu, PDO::PARAM_STR);
                $stmt->bindParam(":id_categorie", $id_categorie, PDO::PARAM_INT);
                $stmt->bindParam(":id_article", $id_article, PDO::PARAM_INT);
                $stmt->execute();
                header("location: ../views/admin/dashboard.php");
            } catch (PDOException $e) {
                return "Erreur lors de modification de l'Article : ". $e->getMessage();
            }
        }
        

        // DELETE ARTICLE METHOD
        public function deleteArticle(int $id_article){
            try{
                $sql = "DELETE FROM article WHERE id_article = :id_article";
                $stmt = $this->database->getConnection()->prepare($sql);
                $stmt->bindParam(":id_article", $id_article, PDO::PARAM_INT);
                $stmt->execute();
                header("location: ../views/admin/dashboard.php");
            } catch (PDOException $e) {
                return "Erreur lors de la suppression de l'Article : ". $e->getMessage();
            }
        }

    }
<?php

    require_once 'user.php';

    class Utilisateur extends User{

        // SIGNUP METHOD
        public function register(string $nom, string $prenom,string $phone,string $email,string $password,string $role = 'Utilisateur'){
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();
            
            if($stmt->rowCount() > 0){
                header("location: ../views/auth/signup.php");
            }
            
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            try {
                $test = $this->database->getConnection();
                $stmt = $test->prepare("INSERT INTO users (prenom, nom, telephone, email, password, role) VALUES (:prenom, :nom, :phone, :email, :pw , :role)");
                $stmt->bindParam(":prenom", $prenom, PDO::PARAM_STR);
                $stmt->bindParam(":nom", $nom, PDO::PARAM_STR);
                $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
                $stmt->bindParam(":email", $email, PDO::PARAM_STR);
                $stmt->bindParam(":pw", $hashedPassword, PDO::PARAM_STR);
                $stmt->bindParam(":role", $role, PDO::PARAM_STR);
        
                $stmt->execute();
        
                header("location: ../views/auth/login.php");
        
            } catch (PDOException $e) {
                return "Erreur lors de l'inscription : " . $e->getMessage();
            }
        }

        // SHOW ARTICLES
        public function showArticles(){
            try {
                $sql = "SELECT * FROM article ORDER BY date_publication DESC";
                $stmt = $this->database->getConnection()->prepare($sql);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    $result = $stmt->fetchAll();
                    return $result;
                }else{
                    return "Aucun article trouvé";
                }
            } catch (PDOException $e) {
                return "Erreur lors de la récupération des articles : " . $e->getMessage();
            }
        }


        // FILTER ARTICLES
        public function filterArticles(string $categorie){
            try {
                $sql = "SELECT * FROM article A JOIN categorie C ON A.id_categorie = C.id_categorie WHERE C.nom_categorie = :categorie ORDER BY A.date_publication DESC";
                $stmt = $this->database->getConnection()->prepare($sql);
                $stmt->bindParam(':categorie', $categorie, PDO::PARAM_STR);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    $result = $stmt->fetchAll();
                    return $result;
                }else{
                    return "Aucun Article Trouvé !";
                }
            } catch (PDOException $e) {
                return "Erreur lors de la récupération des articles : " . $e->getMessage();
            }
        }
    }
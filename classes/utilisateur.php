<?php

    require_once './user.php';

    class Utilisateur extends User{

        // SIGNUP METHOD
        public function register(string $nom, string $prenom,string $phone,string $email,string $password,string $role = 'Utilisateur'){
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();
            
            if($stmt->rowCount() > 0){
                die("<script>alert('Email déjà utilisé !')</script>");
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
        
                header("location: ../views/login.php");
        
            } catch (PDOException $e) {
                return "Erreur lors de l'inscription : " . $e->getMessage();
            }
        }
    }
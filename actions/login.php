<?php
    session_start();

    require_once '../config/db.php';
    require_once "../classes/user.php";

    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST['login'])){
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            if (empty($email) || empty($password)) {
                echo "Veuillez remplir tous les champs.";
            }else {
                
                $user = new User();
    
                $loggedInUser = $user->login( $email, $password);
    
                if ($loggedInUser) {
                    $_SESSION['id_user'] = $loggedInUser->getId();
                    $_SESSION['prenom'] = $loggedInUser->getPrenom();
                    $_SESSION['nom'] = $loggedInUser->getNom();
                    $_SESSION['email'] = $loggedInUser->getEmail();
                    $_SESSION['phone'] = $loggedInUser->getTelephone();
                    $_SESSION['role'] = $loggedInUser->getRole();

                    if($_SESSION['role'] ==='Admin'){
                        header("Location: ../views/admin/dashboard.php");
                    }else if($_SESSION['role'] ==='Auteur'){
                        header("Location: ../views/auteur/dashboard.php");
                    }else if($_SESSION['role'] ==='Utilisateur'){
                        header("Location: ../views/user/articles.php");
                    }
                    exit;
                } else {
                    echo "Identifiants incorrects.";
                }
            }
            
        }
    }
?>
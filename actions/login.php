<?php
    session_start();

    require_once '../config/db.php';
    require_once "../classes/user.php";

    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST['login'])){
            $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
            $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

            if (empty($email) || empty($password)) {
                echo "Veuillez remplir tous les champs.";
            } else {
                $user = new User();
    
                $loggedInUser = $user->login($email, $password);
    
                if ($loggedInUser) {
                    if($loggedInUser->getStatus() == 0){
                        $_SESSION['id_user'] = htmlspecialchars($loggedInUser->getId(), ENT_QUOTES, 'UTF-8');
                        $_SESSION['prenom'] = htmlspecialchars($loggedInUser->getPrenom(), ENT_QUOTES, 'UTF-8');
                        $_SESSION['nom'] = htmlspecialchars($loggedInUser->getNom(), ENT_QUOTES, 'UTF-8');
                        $_SESSION['email'] = htmlspecialchars($loggedInUser->getEmail(), ENT_QUOTES, 'UTF-8');
                        $_SESSION['phone'] = htmlspecialchars($loggedInUser->getTelephone(), ENT_QUOTES, 'UTF-8');
                        $_SESSION['role'] = htmlspecialchars($loggedInUser->getRole(), ENT_QUOTES, 'UTF-8');
                        $_SESSION['photo'] = htmlspecialchars($loggedInUser->getPhoto(), ENT_QUOTES, 'UTF-8');

                        if($_SESSION['role'] === 'Admin'){
                            header("Location: ../views/admin/dashboard.php");
                        } else if($_SESSION['role'] === 'Auteur'){
                            header("Location: ../views/auteur/dashboard.php");
                        } else if($_SESSION['role'] === 'Utilisateur'){
                            header("Location: ../views/user/articles.php");
                        }
                        exit;
                    }else{
                        echo 'Votre Compte est Banné !';
                    }
                } else {
                    echo "Identifiants incorrects.";
                }
            }
        }
    }
?>

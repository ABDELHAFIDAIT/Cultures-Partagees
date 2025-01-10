<?php
    session_start();

    require_once '../classes/comment.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['publish'])) {

            $comment = new Comment();

            $id_article = (int)htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
            $id_user = (int)$_SESSION['id_user'];
            $commentaire = htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8');

    
            $result = $comment->addComment($commentaire, $id_article, $id_user);
        
            $path = '../views/user/details.php?id=' . $id_article;

            if($result) {
                header("Location: $path");
                exit;
            } else {
                return 'Erreur lors de l\'insertion du Commentaire';
            }
        } else {
            echo "Invalid request method 1 .";
        }
    } else {
        echo "Invalid request method 2.";
    }

?>
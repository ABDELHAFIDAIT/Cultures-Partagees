<?php
session_start();
require_once  "../classes/auteur.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['add-article'])) {
        $id_auteur = $_SESSION['id_user'];
        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];
        $id_categorie = $_POST['categorie'];

        $author = new Auteur();
        $author->addArticle($titre,$contenu,$id_auteur,$id_categorie);
        header('Location: ../views/auteur/dashboard.php');
    } else {
        echo "Invalid request method.";
    }
} else {
    echo "Invalid request method.";
}
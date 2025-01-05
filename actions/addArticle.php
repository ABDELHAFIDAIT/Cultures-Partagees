<?php
session_start();
require_once  "../classes/auteur.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['add-article'])) {
        $id_auteur = $_SESSION['id_user'];
        $titre = htmlspecialchars($_POST['titre'], ENT_QUOTES, 'UTF-8');
        $contenu = htmlspecialchars($_POST['contenu'], ENT_QUOTES, 'UTF-8');
        $id_categorie = htmlspecialchars($_POST['categorie'], ENT_QUOTES, 'UTF-8');

        $author = new Auteur();
        $author->addArticle($titre, $contenu, $id_auteur, $id_categorie);
        header('Location: ../views/auteur/dashboard.php');
    } else {
        echo "Invalid request method.";
    }
} else {
    echo "Invalid request method.";
}
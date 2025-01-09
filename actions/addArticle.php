<?php
session_start();
require_once  "../classes/auteur.php";
require_once  "../classes/tag.php";
require_once  "../classes/article.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['add-article'])) {
        $id_auteur = $_SESSION['id_user'];
        $titre = htmlspecialchars($_POST['titre'], ENT_QUOTES, 'UTF-8');
        $contenu = htmlspecialchars($_POST['contenu'], ENT_QUOTES, 'UTF-8');
        $id_categorie = htmlspecialchars($_POST['categorie'], ENT_QUOTES, 'UTF-8');

        $filename = $_FILES["image"]["name"];
        $fileTmpName = $_FILES["image"]["tmp_name"];
        $newFileName = uniqid() ."-" .$filename;
        move_uploaded_file($fileTmpName,"../uploads/".$newFileName);

        $author = new Auteur();
        $author->addArticle($titre, $contenu, $id_auteur, $id_categorie, $newFileName);
        

        $art = new Article();
        $id_art = $art->lastArticle();
        $tg = new Tag();
        $tags = $_POST['tags'];

        foreach($tags as $tag) {
            $tg->assignTag((int)$tag, (int)$id_art); 
        }

        header('Location: ../views/auteur/dashboard.php');
    } else {
        echo "Invalid request method.";
    }
} else {
    echo "Invalid request method.";
}
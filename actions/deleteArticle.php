<?php
    require_once  "../classes/auteur.php";
    
    $id = $_GET['id'];
    
    $author = new Auteur();
    
    $author->deleteArticle($id);
?>
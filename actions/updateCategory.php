<?php
session_start();
require_once  "../classes/admin.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['update-cat'])) {
        $id_categorie = (int)$_POST['id'];
        $nom = htmlspecialchars((string)$_POST['nom-cat'], ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars((string)$_POST['description'], ENT_QUOTES, 'UTF-8');

        $admin = new Admin();

        // echo $id_categorie . ', ' . $nom .', ' . $description ;
        $admin->editCategorie($id_categorie, $nom, $description);
        header('Location: ../views/admin/dashboard.php');
    } else {
        echo "Invalid request method.";
    }
} else {
    echo "Invalid request method.";
}
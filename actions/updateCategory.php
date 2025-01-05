<?php
session_start();
require_once  "../classes/admin.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['update-cat'])) {
        $id_categorie = (int)$_POST['id'];
        $nom = (string)$_POST['nom-cat'];
        $description = (string)$_POST['description'];

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
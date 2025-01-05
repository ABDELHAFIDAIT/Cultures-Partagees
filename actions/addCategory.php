<?php
session_start();
require_once  "../classes/admin.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['add-cat'])) {
        $id_admin = $_SESSION['id_user'];
        $nom_category = htmlspecialchars($_POST['nom-cat'], ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');

        $admin = new Admin();
        $admin->addCategorie($id_admin, $nom_category, $description);
        header('Location: ../views/admin/dashboard.php');
    } else {
        echo "Invalid request method.";
    }
} else {
    echo "Invalid request method.";
}
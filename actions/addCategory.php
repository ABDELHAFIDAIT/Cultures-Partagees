<?php
session_start();
require_once  "../classes/admin.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['add-cat'])) {
        $id_admin = $_SESSION['id_user'];
        $nom_category = $_POST['nom-cat'];
        $description = $_POST['description'];

        $admin = new Admin();
        $admin->addCategorie($id_admin, $nom_category, $description);
        header('Location: ../views/admin/dashboard.php');
    } else {
        echo "Invalid request method.";
    }
} else {
    echo "Invalid request method.";
}
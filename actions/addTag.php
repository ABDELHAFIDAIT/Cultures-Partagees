<?php
session_start();
require_once  "../classes/admin.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['add-tag'])) {
        $id_admin = $_SESSION['id_user'];
        $nom_tag = htmlspecialchars($_POST['nom-tag'], ENT_QUOTES, 'UTF-8');

        $admin = new Admin();
        $admin->addTag($id_admin, $nom_tag);
        header('Location: ../views/admin/dashboard.php');
    } else {
        echo "Invalid request method.";
    }
} else {
    echo "Invalid request method.";
}
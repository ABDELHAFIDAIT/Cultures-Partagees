<?php
session_start();
require_once  "../classes/admin.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['update-tag'])) {
        $id_tag = (int)$_POST['id_tag'];
        $nom = htmlspecialchars($_POST['nom-tag'], ENT_QUOTES, 'UTF-8');

        $admin = new Admin();

        $admin->editTag($id_tag, $nom);
        header('Location: ../views/admin/dashboard.php');
    } else {
        echo "Invalid request method.";
    }
} else {
    echo "Invalid request method.";
}
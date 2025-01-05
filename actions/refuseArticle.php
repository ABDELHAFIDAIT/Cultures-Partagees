<?php
    require_once '../classes/admin.php';

    $id=$_GET['id'];

    $admin = new Admin();

    $admin->rejectArticle($id);

    header('Location: ../views/admin/dashboard.php');
?>
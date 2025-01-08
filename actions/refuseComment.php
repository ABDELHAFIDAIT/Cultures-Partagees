<?php
    require_once '../classes/admin.php';

    $id=$_GET['id'];

    $admin = new Admin();

    $admin->changeStatusComment($id,0);

    header('Location: ../views/admin/dashboard.php');
?>
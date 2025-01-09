<?php

    require_once '../classes/admin.php';

    $ids = $_GET['id'];

    $id = explode('-', $ids);

    $admin = new Admin();

    if($id[1] == 0){
        $admin->changeStatus($id[0], 1);
    }else{
        $admin->changeStatus($id[0], 0);
    }

    header('Location: ../views/admin/dashboard.php');
    exit;
?>
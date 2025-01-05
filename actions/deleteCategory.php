<?php
    require_once  "../classes/admin.php";
    
    $id = $_GET['id'];
    
    $admin = new Admin();
    
    $admin->deleteCategorie($id);
?>
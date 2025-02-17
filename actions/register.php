<?php
session_start();
require_once __DIR__ .'/../classes/utilisateur.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['signup'])) {
        $nom = htmlspecialchars($_POST['nom'], ENT_QUOTES, 'UTF-8');
        $prenom = htmlspecialchars($_POST['prenom'], ENT_QUOTES, 'UTF-8');
        $phone = htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
        $role = htmlspecialchars($_POST['role'], ENT_QUOTES, 'UTF-8');
        
        $filename = $_FILES["image"]["name"];
        $fileTmpName = $_FILES["image"]["tmp_name"];
        $newFileName = uniqid() ."-" .$filename;
        move_uploaded_file($fileTmpName,"../uploads/".$newFileName);

        $utilisateur = new Utilisateur();
        $utilisateur->register($nom, $prenom, $phone, $email, $password, $role, $newFileName);
    } else {
        echo 'Failed to register!';
    }
} else {
    echo 'Impossible to Register!';
}

<?php
session_start();
require_once __DIR__ .'/../classes/utilisateur.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['signup'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $utilisateur = new Utilisateur();
        $utilisateur->register($nom, $prenom, $phone, $email, $password, $role);
    } else {
        echo 'Failed to register!';
    }
} else {
    echo 'Impossible to Register!';
}

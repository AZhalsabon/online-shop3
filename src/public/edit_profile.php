<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ./get_login.php');
    exit;
}


$pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb', 'user', 'pass');

$stmt = $pdo->prepare("SELECT name, email FROM users WHERE id = :id");
$stmt->execute(['id' => $_SESSION['user_id']]);
$user = $stmt->fetch();

$user_name = $user['name'];
$user_email = $user['email'];

require_once './get_profile.php';


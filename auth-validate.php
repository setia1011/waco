<?php

session_start();
session_destroy();

$user = [
    'username' => 'admin',
    'password' => 'awesome!',
    'name' => "Administrator"
];

if (isset($_POST['username']) && $_POST['password']) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($user['username'] == $username && $user['password'] == $password) {
        session_start();
        $_SESSION['auth'] = true;
        $_SESSION['user'] = $user;
        header("Location: /");
    }
}
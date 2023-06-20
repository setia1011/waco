<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$users = [
    [
        'username' => 'admin',
        'password' => 'awesome!',
        'name' => "Administrator"
    ],
    [
        'username' => 'setia',
        'password' => 'awesome!',
        'name' => "Setiadi"
    ]
];

if (isset($_POST['do']) || isset($_GET['do'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $key = array_search($username, array_column($users, 'username'));
        if (array_key_exists($key, $users)) {
            if ($password == $users[$key]['password']) {
                session_start();
                $_SESSION['auth'] = true;
                $_SESSION['user'] = $users[$key];
                header("Location: /");
            } else {
                echo "Password tidak sesuai!";
            }
        } else {
            echo "Username tidak terdaftar!";
        }
    }
    
    if (isset($_GET['do'])) {
        $do = $_GET['do'];
        if ($do === 'exit') {
            session_destroy();
            header("Location: /auth.php");
        }
    }
}


<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>waco - Authentication</title>
    <style>
        input {
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <form action="auth-validate.php" method="post">
        <input type="text" name="username">
        <br>
        <input type="password" name="password">
        <br>
        <input type="submit">
    </form>
</body>
</html>
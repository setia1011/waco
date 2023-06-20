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
    <link rel="stylesheet" href="assets/bulma/bulma.css">
    <link rel="stylesheet" href="assets/font-awesome-6/css/all.min.css">
    <style>
        input {
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <div class="container is-fluid mt-5">
        <div class="columns is-mobile">
            <div class="column is-full-mobile is-half-tablet is-half-desktop is-one-fifth-widescreen is-one-fifth-fullhd">
            <form action="authx.php" method="post">
                <div class="button is-small mb-1">
                    <span class="icon">
                        <i class="fa-brands fa-whatsapp"></i>
                    </span>
                    <span><b>WACO</b></span>
                </div>
                <hr class="mt-1 mb-2" style="background-color: hsl(0deg 0% 87.55%); height: 1px;">
                <div class="field">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-small is-info mb-0" type="text" name="username" required placeholder="Username" value="">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>
                <div class="field">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-small is-info mb-0" type="password" name="password" required placeholder="Password" value="">
                        <span class="icon is-small is-left">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                    </div>
                </div>
                <input type="hidden" name="do" value="auth">
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-small is-link"><i class="fa-solid fa-right-to-bracket is-size-6"></i> &nbsp;&nbsp; <b>LOGIN</b></button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        
    </div>
</body>
</html>
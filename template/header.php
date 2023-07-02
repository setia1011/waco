<?php include("authx.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>waco :: Unofficial WhatsApp API</title>
    <link rel="stylesheet" href="assets/bulma/bulma.css">
    <link rel="stylesheet" href="assets/font-awesome-6/css/all.min.css">
    <script src="assets/jquery.min.js"></script>
    <script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>
    <style>
        .qrcode, .pic {
            display: none;
        }
        .hide {
            display: none;
        }
        @media screen and (min-width: 770px) {
            body {
                /* background-color: blue; */
            }
            #headerx .logox {
                margin-left: 15px;
            }
        }
    </style>
</head>
<body>
    <div id="headerx" class="container is-fluid" style="border-bottom: 2px solid #8080802b;">
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="logox navbar-item has-background-light" href="http://waco.it/">
                    <!-- <img src="assets/whatsapp.svg" width="28" height="28"> -->
                    <i class="fa-brands fa-whatsapp is-size-4 has-text-success"></i>
                </a>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item">
                        <i class="fa-regular fa-book has-text-warning-dark"></i> &nbsp; Documentation
                    </a>
                    <a class="navbar-item">
                        <i class="fa-sharp fa-solid fa-book-blank has-text-danger-dark"></i> &nbsp; API
                    </a>
                </div>
                <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-warning is-small">
                            Hi <?= $name = isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : ""; ?>
                        </a>
                        <a href="authx.php?do=exit" class="button is-danger is-small">
                            <strong><i class="fa-solid fa-right-from-bracket"></i></strong>
                        </a>
                    </div>
                </div>
                </div>
            </div>
        </nav>
    </div>
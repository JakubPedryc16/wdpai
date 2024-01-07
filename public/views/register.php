<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style-register.css">
    <script type="text/javascript" src="/public/js/script.js" defer ></script>
    <title>REGISTER</title>
</head>

<body>
<div class = "top-bar bar"></div>
<div class = "bottom-bar bar"></div>
<div class="container">
    <div class="logo-container">
        <img class = "logo" src="/public/img/logo.svg">
    </div>
    <div class="login-container">
        <form class="register" action="register" method="POST">
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <input class = "normal-input" name="email" type="text" placeholder="email@email.com">
            <input class = "normal-input" name="password" type="password" placeholder="password">
            <input class = "normal-input" name="confirmedPassword" type="password" placeholder="confirm password">
            <input class = "normal-input" name="name" type="text" placeholder="name">
            <input class = "normal-input" name="surname" type="text" placeholder="surname">
            <input class = "normal-input" name="phone" type="text" placeholder="phone">
            <button class = "normal-button" type="submit">REGISTER</button>
        </form>
    </div>
</div>

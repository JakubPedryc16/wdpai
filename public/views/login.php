<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS">
    <meta name="description" content="Information about my website">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css"/>
    <script type="text/javascript" src="/public/js/statistics.js" defer></script>
    <script type="text/javascript" src="/public/js/pageNavigator.js" defer></script>
    <script type="text/javascript" src="/public/js/login.js" defer></script>
    <title>My web page</title>

</head>
<body>
    <div class = "top-bar bar"></div>
    <div class = "bottom-bar bar"></div>
    <div class = "container">
        <div class = "logo-container">
            <img class = "logo" src="/public/img/logo.svg" alt="logo image">
        </div>
        <div class = "login-container">
            <form class = "login" action = "login" method="POST">
                <div class="messages">
                    <?php if(isset($messages)){
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input class = "normal-input" name="email" type="text" placeholder="email@email.com" aria-label = "inputEmail">
                <input class = "normal-input" name="password" type="password"  placeholder="password" aria-label = "inputPassword">
                <button type = "submit" class = "normal-button">Login</button>
                <button class = "normal-button" type="button" onclick="redirectToPage('/register')">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
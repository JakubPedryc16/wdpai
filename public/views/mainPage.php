<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS">
    <meta content="no-cache, must-revalidate, post-check=0, pre-check=0">

    <meta name="description" content="Information about my website">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/style-mainPage.css"/>

    <script type="text/javascript" src="/public/js/session.js"></script>
    <script type="text/javascript" src="/public/js/pageNavigator.js" defer></script>
    <script type="text/javascript" src="/public/js/roleManager.js" ></script>
    <title>My web page</title>

</head>
<body>
<script>checkId()</script>



    <div class = "top-bar bar"></div>
    <div class = "container">
        <div class = "logo-container">
            <img class = "logo" src="/public/img/logo.svg" alt="logo image">
        </div>
        <div class = "login-container">
            <form>
                <button class = "normal-button"  type="button" onclick="redirectToPage('/searchPage')">Search</button>
                <div class = "vertical-buttons">
                    <button class = "square-button" type="button" onclick="logout()">Logout</button>
                    <button class = "square-button" type="button" onclick="redirectToPage('/addCocktailPage')">Add Coctail</button>
                </div>
            </form>
        </div>
    </div>
    <div class = "bottom-bar bar"></div>

    <script>generateButtonIfAdmin()</script>
</body>
</html>
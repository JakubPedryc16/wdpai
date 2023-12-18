<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS">
    <meta name="description" content="Information about my website">
    <link rel="stylesheet" type="text/css" href="/public/css/style-addCoctailPage.css"/>
    <script src="https://kit.fontawesome.com/88509a47d3.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/ingredientsManager.js" defer ></script>
    <title>My web page</title>

</head>
<body>
<div class = "top-bar"></div>
<div class = "container">
    <ul><form id = "myFrom"  action = "addCocktail" method="POST" ENCTYPE="multipart/form-data">

        <li><input  name="name" type="text" placeholder="name"></li>
        <div class = "left-right-container">
            <li><input type = "file" name = "file"></li>
            <li><img src="/public/img/blue-coctail.jpg" alt="Cocktail image"></li>
            <li><input  name="amount" type="text" placeholder="amount"></li>
        </div>

        <li><input  name="search-bar" type="text" placeholder="ingredient"></li>
        <li>
            <div class = "ingredients-search-container">

                <button class="ingredient-button" id="ingredient-id1" type="button" ">
                    <img class = "ingredient-image" src="/public/img/rum.jpg" alt="Ikona">
                    <span class = "ingredient-text" >Tekst na dole</span>
                </button>
                <button class="ingredient-button" id="ingredient-id2" type="button" ">
                    <img class = "ingredient-image" src="/public/img/rum.jpg" alt="Ikona">
                    <span class = "ingredient-text" >Tekst na dole</span>
                </button>
                <button class="ingredient-button" id="ingredient-id3" type="button" >
                    <img class = "ingredient-image" src="/public/img/rum.jpg" alt="Ikona">
                    <span class = "ingredient-text" >Tekst na dole</span>
                </button>

            </div>
        </li>

        <li>
            <div class = ingredients-picked-container>
                <button class="ingredient-picked-button" id="ingredient-picked-id" type="button" >Tekst na dole</button>
                <button class="ingredient-picked-button" id="ingredient-picked-id" type="button" >Tekst na dole</button>
                <button class="ingredient-picked-button" id="ingredient-picked-id" type="button" >Tekst na dole</button>
                <button class="ingredient-picked-button" id="ingredient-picked-id" type="button" >Tekst na dole</button>

            </div>
        </li>

        <li><div class = "left-right-container">
            <button type = "submit" >Confirm </button>
            <button type = "submit" >Cancel  </button>
        </li></div>

    <input type="hidden" id="selectedIngredients" name="selectedIngredients">
    </form></ul>
</div>

<div class = "bottom-bar"></div>

</body>
</html>
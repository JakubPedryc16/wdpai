<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS">
    <meta name="description" content="Information about my website">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/style-specialised.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/style-addCocktailPage.css"/>
    <script type="text/javascript" src="/public/js/searchIngredients.js" defer ></script>
    <script type="text/javascript" src="/public/js/addCocktail.js" defer ></script>
    <script type="text/javascript" src="/public/js/pageNavigator.js" defer></script>
    <title>My web page</title>

</head>
<body>
<div class = "top-bar bar"></div>
<div class = "bottom-bar bar"></div>
<div class = "container">
    <button class="return-button arrow"  type="button" onclick="redirectToPage('/mainPage')">HOME</button>
    <ul><form id = "myFrom"  action = "addCocktail" method="POST" ENCTYPE="multipart/form-data">

        <li><input  name="name" type="text" placeholder="name"></li>
        <div class = "left-right-container">
            <li><input type = "file" name = "file"></li>
            <li><input  name="amount" type="text" placeholder="amount" id="amountPicker"></li>
        </div>

    <li><input class = "search-input" name="search-bar" type="text" placeholder="ingredient" aria-label = "inputIngredient"></li>
        <li>
            <div class = "ingredients-search-container">
                <?php if (isset($ingredients) && is_array($ingredients)): ?>

                        <?php foreach ($ingredients as $ingredient):?>
                            <button class="ingredient-button" id = "<?= $ingredient->getIdIngredients()?>" type = "button" onclick="addPickedIngredient(this)">
                                <img class = "ingredient-image" src="/public/ingredientImages/<?= $ingredient->getImage()?>" alt="Ingredient_Image">
                                <span class = "ingredient-text" ><?= $ingredient->getName()?></span>
                            </button>
                        <?php endforeach?>

                <?php endif; ?>

            </div>
        </li>

        <li>
            <div class = ingredients-picked-container>

            </div>
        </li>

        <li><div class = "left-right-container">
            <button type = "button" onclick="submitForm()" >Confirm</button>
            <button type = "button" onclick="submitForm()" >Cancel</button>
        </li></div>

    <input type="hidden" id="selectedIngredients" name="selectedIngredients">
</form></ul>
</div>

</body>
<template id = "cocktail-template">
    <button class="cocktail-button" id="11">
        <img class = "cocktail-image" src="/public/uploads/image" alt="Cocktail_Image">
        <span class = "cocktail-text" >name</span>
        <i class="fas fa-heart">likeCount</i>
    </button>
</template>

<template id = "ingredient-template">
    <button class="ingredient-button" id="11" type = "button">
        <img class = "ingredient-image" src="/public/img/rum.jpg" alt="Ingredient_Image">
        <span class = "ingredient-text" >Name</span>
    </button>
</template>

<template id = "ingredient-picked-template">
    <button class="ingredient-picked-button" id="11" type = "button">
        <span class = "ingredient-text"> Name </span>
        <span class = "ingredient-amount"> 80 </span>

    </button>
</template>
</html>
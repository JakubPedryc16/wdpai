<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS">
    <meta name="description" content="Information about my website">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/style-specialised.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/style-searchPage.css"/>
    <script type="text/javascript" src="/public/js/session.js"></script>
    <script type="text/javascript" src="/public/js/searchCocktails.js" defer></script>
    <script type="text/javascript" src="/public/js/pageNavigator.js" defer></script>
    <script type="text/javascript" src="/public/js/roleManager.js" defer></script>
    <title>My web page</title>

</head>
<body>

<script>checkId()</script>
<div class = "top-bar bar"></div>
<div class = "container">

    <button class="return-button arrow" type="button" onclick="redirectToPage('/mainPage')">HOME</button>

    <?php if (isset($cocktails) && is_array($cocktails)): ?>
        <section class = "cocktails-container">
            <?php foreach ($cocktails as $cocktail):?>
            <button class="cocktail-button" id="<?= $cocktail->getIdCocktails()?>" onclick="deleteCocktail(<?=$cocktail->getIdCocktails()?>)" type = button>
                <img class = "cocktail-image" src="public/uploads/<?= $cocktail->getImage()?>" alt="Cocktail_Image">
                <span class = "cocktail-text" ><?= $cocktail->getName()?> </span>
                <?php endforeach?>

        </section>
    <?php endif; ?>

    <div class = "ingredients-container">
        <div></div>
        <div class = "search-bar-container">
            <input class = "search-input" name="search-bar" type="text" placeholder="cocktail_name" aria-label = "inputIngredient" onkeyup="addDeletion()">
        </div>
    </div>
</div>

<div class = "bottom-bar bar"></div>

</body>
<template id = "cocktail-template">
    <button class="cocktail-button" id="id">
        <img class = "cocktail-image" src="/public/uploads/image" alt="Cocktail_Image">
        <span class = "cocktail-text" >name</span>
    </button>
</template>

<template id = "ingredient-template">
    <button class="ingredient-button" id="id">
        <img class = "ingredient-image" src="/public/img/rum.jpg" alt="Ingredient_Image">
        <span class = "ingredient-text" >Name</span>
        <span class = "ingredient-amount"> 80 </span>
    </button>
</template>

<template id = "ingredient-picked-button">
    <button class="ingredient-picked-button" id="id">
        <span class = "ingredient-text" >Name</span>
    </button>
</template>

</html>
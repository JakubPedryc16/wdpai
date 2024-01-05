<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS">
    <meta name="description" content="Information about my website">
    <link rel="stylesheet" type="text/css" href="/public/css/style-searchPage.css"/>
    <script src="https://kit.fontawesome.com/88509a47d3.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/searchIngredients.js" defer></script>
    <script type="text/javascript" src="/public/js/statistics.js" defer></script>
    <title>My web page</title>

</head>
<body>
    <div class = "top-bar bar"></div>
    <div class = "container">

        <?php if (isset($cocktails) && is_array($cocktails)): ?>
            <section class = "cocktails-container">
                <?php foreach ($cocktails as $cocktail):?>
                <button class="cocktail-button" id="<?= $cocktail->getIdCocktails()?>">
                    <img class = "cocktail-image" src="public/uploads/<?= $cocktail->getImage()?>" alt="Cocktail_Image">
                    <span class = "cocktail-text" ><?= $cocktail->getName()?> </span>
                    <i class="fas fa-heart"><?= $cocktail->getLikeCount(); ?></i>
                <?php endforeach?>

            </section>
        <?php endif; ?>


        <div class = "ingredients-container">
            <div class = "search-bar-container">
                <input class = "search-input" name="search-bar" type="text" placeholder="ingredient" aria-label = "inputIngredient">
            </div>

            <?php if (isset($ingredients) && is_array($ingredients)): ?>

            <div class = "ingredients-search-container">
                <?php foreach ($ingredients as $ingredient):?>
                <button class="ingredient-button" id = "<?= $ingredient->getIdIngredients()?>">
                    <img class = "ingredient-image" src="/public/ingredientImages/<?= $ingredient->getImage()?>" alt="Ingredient_Image">
                    <span class = "ingredient-text" ><?= $ingredient->getName()?></span>
                </button>
                <?php endforeach?>
            </div>
            <?php endif; ?>
            <div class = ingredients-picked-container></div>
        </div>  
    </div>

    <div class = "bottom-bar bar"></div>
    
</body>
<template id = "cocktail-template">
    <button class="cocktail-button" id="id">
        <img class = "cocktail-image" src="/public/uploads/image" alt="Cocktail_Image">
        <span class = "cocktail-text" >name</span>
        <i class="fas fa-heart">likeCount</i>
    </button>
</template>

<template id = "ingredient-template">
    <button class="ingredient-button" id="id">
        <img class = "ingredient-image" src="/public/img/rum.jpg" alt="Ingredient_Image">
        <span class = "ingredient-text" >Name</span>
    </button>
</template>

<template id = "ingredient-picked-button">
    <button class="ingredient-picked-button" id="id">
        <span class = "ingredient-text" >Name</span>
    </button>
</template>

</html>
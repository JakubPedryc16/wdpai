<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS">
    <meta name="description" content="Information about my website">
    <link rel="stylesheet" type="text/css" href="/public/css/style-searchPage.css"/>
    <script src="https://kit.fontawesome.com/88509a47d3.js" crossorigin="anonymous"></script>
    <title>My web page</title>

</head>
<body>
    <div class = "top-bar bar"></div>
    <div class = "container">
        <button class="return-button arrow">
            <i class="fa-solid fa-angle-left"></i>
        </button>

        <?php if (isset($cocktails) && is_array($cocktails) && count($cocktails) >= 4): ?>

        <div class = "cocktail-container">
                <button class="arrow-cocktail-button arrow">
                    <i class="fa-solid fa-angle-left"></i>
                </button>
                <div class = "cocktail-row">
                    <button class="cocktail-button">
                        <img class = "cocktail-image" src="public/uploads/<?= $cocktails[0]->getImage()?>" alt="Cocktail_Image">
                        <span class = "cocktail-text" ><?= $cocktails[0]->getName()?></span>
                    </button>
                    <button class="cocktail-button">
                        <img class = "cocktail-image" src="public/uploads/<?= $cocktails[1]->getImage()?>" alt="Cocktail_Image">
                        <span class = "cocktail-text" ><?= $cocktails[1]->getName()?></span>
                    </button>
                </div>

                <div class = "cocktail-row">
                    <button class="cocktail-button">
                        <img class = "cocktail-image" src="public/uploads/<?= $cocktails[2]->getImage()?>" alt="Cocktail_Image">
                        <span class = "cocktail-text" ><?= $cocktails[2]->getName()?></span>
                    </button>
                    <button class="cocktail-button">
                        <img class = "cocktail-image" src="public/uploads/<?= $cocktails[3]->getImage()?>" alt="Cocktail_Image">
                        <span class = "cocktail-text" ><?= $cocktails[3]->getName()?></span>
                    </button>
                </div>
                <button class="arrow-cocktail-button arrow">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
        </div>
        <?php endif; ?>


        <div class = "ingredients-container">
            <div class = "search-bar-container">
                <input class = "search-input" name="search-bar" type="text" placeholder="ingredient" aria-label = "inputIngredient">
            </div>
            
            <div class = "ingredients-search-container">
                <button class="arrow-ingredient-button arrow">
                    <i class="fa-solid fa-angle-left"></i>
                </button>
                <button class="ingredient-button">
                    <img class = "ingredient-image" src="/public/img/rum.jpg" alt="Ingredient_Image">
                    <span class = "ingredient-text" >Name</span>
                </button>
                <button class="ingredient-button">
                    <img class = "ingredient-image" src="/public/img/rum.jpg" alt="Ingredient_Image">
                    <span class = "ingredient-text" >Name</span>
                </button>
                <button class="ingredient-button">
                    <img class = "ingredient-image" src="/public/img/rum.jpg" alt="Ingredient_Image">
                    <span class = "ingredient-text" >Name</span>
                </button>
                <button class="arrow-ingredient-picked-button arrow">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>
            <div class = ingredients-picked-container>
                <button class="arrow-ingredient-button arrow">
                    <i class="fa-solid fa-angle-left"></i>
                </button>
                <button class="ingredient-picked-button">
                    <span class = "ingredient-text" >Name</span>
                </button>
                <button class="ingredient-picked-button">
                    <span class = "ingredient-text" >Name</span>
                </button>
                <button class="ingredient-picked-button">
                    <span class = "ingredient-text" >Name</span>
                </button>
                <button class="ingredient-picked-button">
                    <span class = "ingredient-text" >Name</span>
                </button>
                <button class="arrow-ingredient-picked-button arrow">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>
        </div>  
    </div>

    <div class = "bottom-bar bar"></div>
    
</body>
</html>
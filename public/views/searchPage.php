<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS">
    <meta name="description" content="Information about my website">
    <link rel="stylesheet" type="text/css" href="public/css/style-search-page.css"/>
    <script src="https://kit.fontawesome.com/88509a47d3.js" crossorigin="anonymous"></script>
    <title>My web page</title>

</head>
<body>
    <div class = "top-bar"></div>
    <div class = "container">
        <button class="return-button arrow">
            <i class="fa-solid fa-arrow-left"></i>
        </button>

        <div class = "coctail-container">
            <button class="arrow-coctail-button arrow">
                <i class="fa-solid fa-arrow-left"></i>
            </button>   
            <div class = "coctail-row">
                <button class="coctail-button">
                    <img class = "coctail-image" src="public/uploads/<?= $cocktail->getImage() ?>" alt="Ikona">
                    <span class = "coctail-text" ><?= $cocktail->getName() ?></span>
                </button>
                <button class="coctail-button">
                    <img class = "coctail-image" src="public/img/blue-coctail.jpg" alt="Ikona">
                    <span class = "coctail-text" >Tekst na dole</span>
                </button>
            </div>   

            <div class = "coctail-row">
                <button class="coctail-button">
                    <img class = "coctail-image" src="public/img/blue-coctail.jpg" alt="Ikona">
                    <span class = "coctail-text" >Tekst na dole</span>
                </button>
                <button class="coctail-button">
                    <img class = "coctail-image" src="public/img/blue-coctail.jpg" alt="Ikona">
                    <span class = "coctail-text" >Tekst na dole</span>
                </button>
            </div>  
            
            <button class="arrow-coctail-button arrow">
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>  


        <div class = "ingredients-container">
            <div class = "search-bar-container">
                <input class = "search-input" name="search-bar" type="text" placeholder="ingredient">
            </div>
            
            <div class = "ingredients-search-container">
                <button class="arrow-ingredient-button arrow">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <button class="ingredient-button">
                    <img class = "ingredient-image" src="public/img/rum.jpg" alt="Ikona">
                    <span class = "ingredient-text" >Tekst na dole</span>
                </button>
                <button class="ingredient-button">
                    <img class = "ingredient-image" src="public/img/rum.jpg" alt="Ikona">
                    <span class = "ingredient-text" >Tekst na dole</span>
                </button>
                <button class="ingredient-button">
                    <img class = "ingredient-image" src="public/img/rum.jpg" alt="Ikona">
                    <span class = "ingredient-text" >Tekst na dole</span>
                </button>
                <button class="arrow-ingredient-picked-button arrow">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
            <div class = ingredients-picked-container>
                <button class="arrow-ingredient-button arrow">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <button class="ingredient-picked-button">
                    <span class = "ingredient-text" >Tekst na dole</span>
                </button>
                <button class="ingredient-picked-button">
                    <span class = "ingredient-text" >Tekst na dole</span>
                </button>
                <button class="ingredient-picked-button">
                    <span class = "ingredient-text" >Tekst na dole</span>
                </button>
                <button class="ingredient-picked-button">
                    <span class = "ingredient-text" >Tekst na dole</span>
                </button>
                <button class="arrow-ingredient-picked-button arrow">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>  
    </div>

    <div class = "bottom-bar"></div>
    
</body>
</html>


const searchCocktails = document.querySelector('input[placeholder="cocktail_name"]')
const cocktailContainer = document.querySelector('section')
const ingredientContainer = document.querySelector('.ingredients-search-container')
searchCocktails.addEventListener("keyup", function(event) {
    if(event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

       fetch("/search", {
           method: "POST",
           headers: {
               'Content-Type': 'application/json'
           },
           body: JSON.stringify(data)
       }).then(function (response){
           return response.json();
       }).then(function (cocktails){

           cocktailContainer.innerHTML = "";
           loadCocktails(cocktails)
       });

    }
    });

function loadCocktails(cocktails) {
    cocktails.forEach(cocktail => {
        //console.log(cocktail);
        createCocktail(cocktail);
    })
}
function createCocktail(cocktail) {

    const template = document.querySelector("#cocktail-template");

    const clone = template.content.cloneNode(true);

    const image = clone.querySelector("img");
    image.src = `/public/uploads/${cocktail.image}`;

    const name = clone.querySelector("span");
    name.innerHTML = cocktail.name;

    const button = clone.querySelector(".cocktail-button");

    button.id = cocktail.id_cocktails;
    cocktailContainer.appendChild(clone);
}

function loadCocktailIngredients(buttonId){

    const data = {search: buttonId}

    fetch("/getIngredients", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
    })
        .then(function (ingredients){
            ingredientContainer.innerHTML = "";
            //console.log(ingredients);
            loadIngredients(ingredients)
    });



}

function loadIngredients(ingredients) {
    ingredients.forEach(ingredient => {
        //console.log(ingredient);
        createIngredient(ingredient);
    })
}

function createIngredient(ingredient) {

    const template = document.querySelector("#ingredient-template");

    const clone = template.content.cloneNode(true);

    const image = clone.querySelector("img");
    image.src = `/public/ingredientImages/${ingredient.image}`;

    const name = clone.querySelector("span");
    name.innerHTML = ingredient.name;

    const button = clone.querySelector(".ingredient-button");

    button.id = ingredient.id;

    const amount = clone.querySelector(".ingredient-amount")
    amount.innerHTML = ingredient.amount;

    ingredientContainer.appendChild(clone);
}
function addIngredientsShowing() {

    var cocktailButtons = document.querySelectorAll('.cocktail-button');
    cocktailButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var cocktailId = parseInt(button.id);
            //console.log(cocktailId);
            loadCocktailIngredients(cocktailId);
        });
    });
}
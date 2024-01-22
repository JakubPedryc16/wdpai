

const searchIngredients = document.querySelector('input[placeholder="cocktail_name"]')
const ingredientContainer = document.querySelector('.ingredients-search-container')

searchIngredients.addEventListener("keyup", function(event) {
    if(event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

       fetch("/searchIngredients", {
           method: "POST",
           headers: {
               'Content-Type': 'application/json'
           },
           body: JSON.stringify(data)
       })
           .then(function (response){
           return response.json();
       }).then(function (ingredients){
           ingredientContainer.innerHTML = "";
           loadCocktails(ingredients)
       });



    }
    });

function loadCocktails(ingredients) {
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
    ingredientContainer.appendChild(clone);
}

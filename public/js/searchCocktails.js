

const searchCocktails = document.querySelector('input[placeholder="ingredient"]')
const cocktailContainer = document.querySelector('section')
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
        console.log(cocktail);
        createCocktail(cocktail);
    })
}
function createCocktail(ingredient) {

    const template = document.querySelector("#cocktail-template");

    const clone = template.content.cloneNode(true);

    const image = clone.querySelector("img");
    image.src = `/public/uploads/${ingredient.image}`;

    const name = clone.querySelector("span");
    name.innerHTML = ingredient.name;

    const like = clone.querySelector(".fa-heart");

    like.innerText = ingredient.likeCount;

    const button = clone.querySelector(".cocktail-button");

    button.id = ingredient.id;
    cocktailContainer.appendChild(clone);
}
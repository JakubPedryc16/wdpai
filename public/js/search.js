
const search = document.querySelector('input[placeholder="ingredient"]')
const cocktailContainer = document.querySelector('section')
search.addEventListener("keyup", function(event) {
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

           loadProjects(cocktails)
       });
    }
    });

function loadProjects(cocktails) {
    cocktails.forEach(cocktail => {
        console.log(cocktail);
        createCocktail(cocktail)
    })
}
function createCocktail(cocktail) {
    const template = document.querySelector("#cocktail-template");

    const clone = template.content.cloneNode(true);

    const image = clone.querySelector("img");
    image.src = `/public/uploads/${cocktail.image}`;
    const name = clone.querySelector("span");
    name.innerHTML = cocktail.name;
    //const like = clone.querySelector(".fa-nameToReplace");
    //like.innerText = cocktail.like;
    cocktailContainer.appendChild(clone);
}
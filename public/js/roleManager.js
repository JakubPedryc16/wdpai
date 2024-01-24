function generateButtonIfAdmin() {
    var userRole = sessionStorage.getItem('userRole');
    if (userRole) {
        if (userRole === 'admin') {
            var manageCocktailsButton = document.createElement('button');
            manageCocktailsButton.className = 'square-button';
            manageCocktailsButton.innerText = 'Manage Cocktails';
            manageCocktailsButton.type = 'button';
            manageCocktailsButton.addEventListener('click', function () {
                redirectToPage('/manageCocktailsPage');
            });

            document.querySelector('.vertical-buttons').appendChild(manageCocktailsButton);
        }
    } else {
        console.error('Rola użytkownika nie została znaleziona w sessionStorage.');
    }
}



function deleteCocktail(cocktailId) {
    if (confirm('Czy na pewno chcesz usunąć ten koktajl?')) {
        fetch('/deleteCocktail', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ cocktailId: cocktailId }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Koktajl został pomyślnie usunięty!');
                    location.reload();
                } else {
                    alert('Błąd podczas usuwania koktajlu.');
                }
            })
            .catch(error => {
                console.error('Wystąpił błąd:', error);
            });
    }

}

function addDeletion() {
    var cocktailButtons = document.querySelectorAll('.cocktail-button');

    cocktailButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var cocktailId = button.id;
            deleteCocktail(cocktailId);
        });
    });
}






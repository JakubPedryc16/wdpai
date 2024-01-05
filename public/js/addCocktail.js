window.addEventListener("keydown", (event) => {
    if (event.isComposing || event.key === 'Enter') {
        event.preventDefault();
    }
});

function addPickedIngredient(button) {

    const template = document.querySelector("#ingredient-picked-template");
    const clone = template.content.cloneNode(true);
    const amount = document.querySelector("#amountPicker").value;

    if (!amount) {
        alert('Please enter an amount.');
        return;
    }

    const name = button.querySelector("span").innerHTML;
    const cloneButton = clone.querySelector(".ingredient-picked-button");

    cloneButton.id = button.id;
    clone.querySelector("span").innerHTML = name;
    clone.querySelector(".ingredient-amount").innerHTML = amount;

    const ingredientsPickedContainer = document.querySelector(".ingredients-picked-container");
    ingredientsPickedContainer.appendChild(clone);
}

function submitForm() {

    const name =  document.querySelector('input[placeholder="name"]');
    if (!name.value || !name.value.trim()) {
        alert('Please enter a name.');
        return;
    }
    const fileInput = document.querySelector('input[name="file"]');

    if (!fileInput.files[0] || !fileInput.files[0].name.trim()) {
        alert('Please enter a file.');
        return;
    }
    const fileName = fileInput.files[0].name;
    moveUploadedFile(fileInput.files[0]);
    // Get all picked ingredients
    const pickedButtons = document.querySelectorAll(".ingredient-picked-button");
    if (pickedButtons.length === 0) {
        // If 'pickedIngredients' is empty, display an alert and return without further processing
        alert('Please pick at least one ingredient.');
        return;
    }
    // Create an array to store picked ingredients data
    const pickedIngredients = [];

    pickedButtons.forEach(button => {
        const ingredientData = {
            id: button.id,
            amount: button.querySelector(".ingredient-amount").innerHTML
        };
        pickedIngredients.push(ingredientData);
    });
    const cocktail = {
        name: name.value,
        image: fileName,
        ingredients: pickedIngredients
    };


    fetch('/addCocktail', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify( cocktail ),
    })
        .then(response => {
            console.log('Fetch response:', response);
            return response.text();  // Change to text() to get the raw response content
        })
        .then(data => {
            console.log('Response:', data);

            // Check for messages in the response
            const messages = data.messages;
            if (messages && messages.error) {
                // Display an alert for errors
                alert('Error: ' + messages.error);
            } else {
                // If everything is fine, navigate to '/searchPage'
                window.location.href = "/searchPage";
            }
        })
        .catch(error => console.error('Error:', error));
}

function moveUploadedFile(file) {

    const formData = new FormData();
    formData.append('name', file.name.trim());
    formData.append('file', file);

    // Fetch and handle the data
    fetch('/upload', {
        method: 'POST',
        body: formData,
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle any other error scenarios here
            alert('An error occurred. Please try again.');
        });
}

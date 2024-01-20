document.addEventListener('DOMContentLoaded', function () {
    // Dodaj obsługę zdarzenia dla formularza logowania
    var loginForm = document.querySelector('.login');
    loginForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Zapobiegaj domyślnej akcji przesyłania formularza

        // Pobierz dane logowania z formularza
        var email = loginForm.querySelector('[name="email"]').value;
        var password = loginForm.querySelector('[name="password"]').value;

        // Wywołaj funkcję logowania za pomocą fetch API
        login(email, password);
    });
});

function login(email, password) {
    // Wywołaj metodę logowania za pomocą fetch API
    fetch('/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password),
    })
        .then(response => response.json())
        .then(data => {
            // Sprawdź, czy wystąpił błąd
            if (data.error) {
                // Obsłuż błąd logowania
                console.error('Błąd logowania:', data.error);
                // Wyświetl komunikat o błędzie na stronie
                var messagesContainer = document.querySelector('.messages');
                messagesContainer.innerHTML = data.error;
            } else {
                // Pobierz dane użytkownika z odpowiedzi
                var idUser = data.idUser;
                var userRole = data.userRole;
                // Dodaj dane do sessionStorage
                sessionStorage.setItem('idUser', idUser);
                sessionStorage.setItem('userRole', userRole);

                // Przekieruj użytkownika na stronę główną lub inną, jeśli to konieczne
                redirectToPage('/mainPage');
            }
        })
        .catch(error => {
            console.error('Wystąpił błąd:', error);
            // Obsłuż błąd komunikatem na stronie
            var messagesContainer = document.querySelector('.messages');
            messagesContainer.innerHTML = 'Wystąpił błąd podczas logowania.';
        });
}

// Funkcja do przekierowywania użytkownika na inną stronę
function redirectToPage(page) {
    window.location.href = page;
}

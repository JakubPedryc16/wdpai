document.addEventListener('DOMContentLoaded', function () {

    var loginForm = document.querySelector('.login');
    loginForm.addEventListener('submit', function (event) {
        event.preventDefault();

        var email = loginForm.querySelector('[name="email"]').value;
        var password = loginForm.querySelector('[name="password"]').value;

        login(email, password);
    });
});

function login(email, password) {

    fetch('/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password),
    })
        .then(response => response.json())
        .then(data => {

            if (data.error) {

                console.error('Błąd logowania:', data.error);

                var messagesContainer = document.querySelector('.messages');
                messagesContainer.innerHTML = data.error;
            } else {

                var idUser = data.idUser;
                var userRole = data.userRole;
                sessionStorage.setItem('idUser', idUser);
                sessionStorage.setItem('userRole', userRole);

                redirectToPage('/mainPage');
            }
        })
        .catch(error => {
            console.error('Wystąpił błąd:', error);

            var messagesContainer = document.querySelector('.messages');
            messagesContainer.innerHTML = 'Wystąpił błąd podczas logowania.';
        });
}


function redirectToPage(page) {
    window.location.href = page;
}

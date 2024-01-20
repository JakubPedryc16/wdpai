<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
header("Cache-Control: no-cache, must-revalidate");


class SecurityController extends AppController
{
    public function login()
    {
        $userRepository = new UserRepository();

        // Sprawdź, czy przesyłane są dane POST
        if ($this->isPost()) {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $user = $userRepository->getUser($email);

            if (!$user || !$this->verifyPassword($password, $user->getPassword(), $user->getSalt())) {
                // Zwróć błąd w przypadku nieprawidłowego loginu lub hasła
                echo json_encode(['error' => 'Nieprawidłowy login lub hasło']);
                exit();
            }

            // Pobierz dane użytkownika w przypadku poprawnych danych logowania
            $idUser = $user->getIdUsers();
            $userRole = $user->getRole();

            // Zwróć dane użytkownika jako JSON
            echo json_encode(['idUser' => $idUser, 'userRole' => $userRole]);
            exit();
        }

        // Zwróć błąd, jeśli dane nie są przesyłane jako POST
        echo json_encode(['error' => 'Brak danych POST']);
    }
    public function register()
    {
        $userRepository = new UserRepository();
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];


        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        $options = [
            'cost' => 12,
        ];
        $salt = password_hash(random_bytes(22), PASSWORD_BCRYPT, $options);

        $hashedPassword = password_hash($password . $salt, PASSWORD_BCRYPT, $options);

        $user = new User($email, $hashedPassword, $name, $surname, $salt);

        $userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
    function verifyPassword($userInputPassword, $storedHashedPassword, $storedSalt) {

        $combinedPassword = $userInputPassword . $storedSalt;

        return password_verify($combinedPassword, $storedHashedPassword);
    }
}
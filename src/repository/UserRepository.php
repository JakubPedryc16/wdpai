<?php

require_once __DIR__.'/../models/User.php';
require_once 'Repository.php';

class UserRepository extends Repository
{
    public function getUser(string $email) {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.users WHERE email = :email 
        ');
        $stmt->bindParam(':email',$email,PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$user){
            return null;
        }
        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['salt'],
            $user['id_users'],
            $user['role']

        );
    }
    public function addUser(User $user): ?int {
        $pdo = $this->database->connect();

        try {
            $stmt = $pdo->prepare('
            INSERT INTO public.users ("email", "password", "name", "surname", "salt")
            VALUES (?, ?, ?, ?, ?)
        ');

            $stmt->execute([
                $user->getEmail(),
                $user->getPassword(),
                $user->getName(),
                $user->getSurname(),
                $user->getSalt()
            ]);

            $lastInsertId = $pdo->lastInsertId();

            return $lastInsertId ? (int)$lastInsertId : null;
        } catch (PDOException $e) {
            return null;
        }
    }

}
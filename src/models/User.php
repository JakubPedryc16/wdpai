<?php

class User
{
 private $email;
 private $password;
 private $name;
 private $surname;

 private $salt;
private $idUsers;
private $role;

    public function __construct(string $email, string $password, string $name, string $surname, string $salt, int $idUsers = null, string $role = null)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->salt = $salt;
        $this->idUsers = $idUsers;
        $this->role = $role;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }

    public function getIdUsers(): int
    {
        return $this->idUsers;
    }

    public function setIdUsers(int $idUsers): void
    {
        $this->idUsers = $idUsers;
    }

    public function getSalt(): string
    {
        return $this->salt;
    }

    public function setSalt(string $salt): void
    {
        $this->salt = $salt;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): void
    {
        $this->role = $role;
    }


}
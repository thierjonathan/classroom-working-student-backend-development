<?php declare(strict_types=1);

namespace App;

// Abstract base for all users.
abstract class UserBase
{
    public string $name;         
    protected string $email;   
    protected string $password;  
    private int $id;
    
    // Set the user's name.
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    // Get the user's name.
    public function getName(): string
    {
        return $this->name;
    }

    // Set the user's email.
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    // Get the user's email.
    public function getEmail(): string
    {
        return $this->email;
    }

    // Set the user's password
    protected function setPassword(string $password): void
    {
        $this->password = $password;
    }

    private function setId(int $id): void
    {
        $this->id = $id;
    }
}
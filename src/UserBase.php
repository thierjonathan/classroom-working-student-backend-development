<?php declare(strict_types=1);

namespace App;

/** 
 * Abstract base for all user types.
 * Contains user attributes and functions for user management
 */
abstract class UserBase
{
    public const ROLE_ADMIN = 'admin';
    public const ROLE_CUSTOMER = 'customer';

    /**
     * Counts the number of UserBase instances created.
     * Include different types of users derived from UserBase 
    */
    protected static int $instanceCount = 0;

    public string $name;         
    protected string $email;   
    protected string $password;  
    private int $id;

    public function __construct(string $name, string $email, string $password) 
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setId(rand(0, 100));
        self::$instanceCount++;
    }

    /**
     * Magic method to allow read access to email property only.
     * Throws an exception for all other properties.
    */
    public function __get(string $property)
    {
        if ($property === 'email') {
            return $this->email;
        }
        throw new \Exception("Cannot access property: " . $property);
    }

    /**
     * Magic method to allow write access to email property only.
     * Throws an exception for all other properties.
    */
    public function __set(string $property, $value): void
    {
        if ($property === 'email') {
            $this->setEmail($value); 
            return;
        }
        throw new \Exception("Cannot set property: " . $property);
    }
    
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * set the user's email address
     * throws an exception if email format is invalid
    */
    public function setEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Invalid email address: $email");
        }
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    protected function setPassword(string $password): void
    {
        $this->password = $password;
    }

    private function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public static function getUserInstanceCount(): int
    {
        return self::$instanceCount;
    }
}
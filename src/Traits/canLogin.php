<?php
declare(strict_types=1);

namespace App\Traits;
/**
 * Trait CanLogin
 * Provides a simple login method that compares user password.
 * (Note: This is not secure and only for demo)
 */
trait CanLogin
{
    public function login(string $password): bool
    {
        return $this->password === $password;
    }
}
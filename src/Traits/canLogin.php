<?php
declare(strict_types=1);

namespace App\Traits;

trait CanLogin
{
    public function login(string $password): bool
    {
        // Compare input to property
        return $this->password === $password;
    }

}
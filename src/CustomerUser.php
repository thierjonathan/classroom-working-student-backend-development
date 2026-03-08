<?php
declare(strict_types=1);

namespace App;

use App\Traits\CanLogin;

/**
 * CustomerUser class.
 * Represents a customer user with only login capability.
 */
class CustomerUser extends UserBase
{
    use CanLogin;

    public function __construct(string $name, string $email, string $password) 
    {
        parent::__construct($name, $email, $password);
    }
}
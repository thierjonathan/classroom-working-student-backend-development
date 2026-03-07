<?php
declare(strict_types=1);

namespace App;

use App\Traits\CanLogin;

// Customer user class.
class CustomerUser extends UserBase
{
    use CanLogin;
    
    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
}
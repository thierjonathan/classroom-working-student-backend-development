<?php
declare(strict_types=1);

namespace App;

use App\Traits\CanLogin;
use App\Interfaces\Resettable;

/**
 * AdminUser class.
 * Administrative user with password reset and login capabilities.
 */
class AdminUser extends UserBase implements Resettable
{
    use CanLogin;

    public function __construct(string $name, string $email, string $password) 
    {
        parent::__construct($name, $email, $password);
    }

    /**
     * Reset the user's password.
     * Note: This just prints a message for demo purposes only.
     */
    public function resetPassword(): void
    {
        echo "{$this->email} resets password to: newpassword123\n";
    }
}
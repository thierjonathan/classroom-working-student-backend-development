<?php
declare(strict_types=1);

namespace App;

use App\Traits\CanLogin;
use App\Interfaces\Resettable;

//Admin user class.
class AdminUser extends UserBase
{
    use CanLogin;
    use Resettable;

    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function resetPassword(): void
    {
        echo "{$this->name} password reset to: customer-new-pass\n";
    }
}
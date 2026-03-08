<?php
declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use App\AdminUser;

echo "Unit test for admin user\n";

// Arrange: create an admin user
$admin = new AdminUser('Joe', 'joe@example.com', 'password1234');

// Assert: Name is set correctly
assert($admin->getName() === 'Joe', "Wrong Name");

// Assert: Email is set correctly
assert($admin->getEmail() === 'joe@example.com', 'wrong email');

// Assert: Login succeeds with correct password
assert($admin->login('password1234') === true, 'Correct password failed');

// Assert: Login fails with wrong password
assert($admin->login('wrongpassword') === false, 'Wrong password did not fail');

echo "All assertions correct!\n";
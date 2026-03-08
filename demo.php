<?php declare(strict_types=1);

use App\UserBase;
use App\AdminUser;
use App\CustomerUser;

require_once __DIR__ . '/vendor/autoload.php';

echo "PHP Basics Coding Challenge Demo\n";

echo "---Demo: Explicit getter vs. __get magic method---\n";

// Create new users
$admin = new AdminUser('Jessica', 'Jessica@example.com', "password123");

// 1. Using the regular getEmail() method
echo "Using getEmail(): " . $admin->getEmail() . "\n";

// 2. Using magic __get for 'email'
echo "Using \$user->email: " . $admin->email . "\n";

echo "--- Demo: CanLogin trait and resetPassword method ---\n";

// Create an AdminUser 
$admin = new AdminUser('Martha', 'martha@example.com', 'password123');

// Test incorrect login
if ($admin->login('wrongpassword')) {
    echo "Logged in succesfully!\n";
} else {
    echo "Wrong Password\n";
}

// Test correct login
if ($admin->login('password123')) {
    echo "Logged in succesfully!\n";
}

// Demonstrate resetPassword functionality
echo "Testing reset password:\n";
$admin->resetPassword(); 

echo "--- Numeric array vs associative array ---\n";

// Numeric array: list of users
// Numeric array allows us to easily loop through the user data.
// It is especially ideal for filtering or mapping.
$users = [
    new AdminUser('Alice', 'alice@example.com', 'password1'),
    new CustomerUser('Bob', 'bob@example.com', 'password2'),
];

// Use the array_map and the anonymous function to extract emails from users.
$getUserEmail = function($user) {
    return $user->getEmail();
};
$userEmails = array_map($getUserEmail, $users);
print_r($userEmails);

// Use array_filter with a named function to separate only CustomerUser objects
function is_customer($user)
{
  return($user instanceof CustomerUser);
}
$CustomerUsers = array_filter($users, "is_customer");
echo "Customer users:\n";
print_r($CustomerUsers);    

// Associative array: list of users with the email as the key
// Associative array is useful for fast lookup by its unique key, 
// without having to loop through the whole array.
$usersWithEmailKey = [];
foreach ($users as $user) {
    $usersWithEmailKey[$user->getEmail()] = $user;
}
echo "Users keyed by email:\n";
print_r($usersWithEmailKey); 

// Use the function array_key_exists() to proof if a certain user exist 
if (array_key_exists('alice@example.com', $usersWithEmailKey)) {
    echo "Alice Exists!\n";
}

echo "--- Demo: Constant and static methods ---\n";

// Use static method to retrieve the number of created users 
echo "Created users: " . UserBase::getUserInstanceCount() . PHP_EOL;

// Use class constant to avoid hardcoding roles.
echo "Available roles: " . UserBase::ROLE_ADMIN . ", " . UserBase::ROLE_CUSTOMER . PHP_EOL;

echo "--- Demo: Invalid email ---\n";

// Invalid Email format: This demonstrates exception handling for invalid user input.
// The constructor will throw an InvalidArgumentException on invalid email format.
try {
    $user = new AdminUser('Elsa', 'invalid-email', 'password123');
} catch (\InvalidArgumentException $e) {
    echo "Error creating user: " . $e->getMessage() . PHP_EOL;
}

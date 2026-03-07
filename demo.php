<?php declare(strict_types=1);

use App\AdminUser;
use App\CustomerUser;

// Simple test/demo script - extend as you like!
require_once __DIR__ . '/vendor/autoload.php';

echo "PHP Basics Coding Challenge Demo\n";

// Create an example user
$admin = new AdminUser('Jessica', 'Jessica@example.com', "password123");
$customer = new CustomerUser('John', 'John@demo.com', "password123");

echo $admin->getName();     
echo $customer->getEmail(); 

// Logging in
if ($admin->login('wrongpassword')) {
    echo "Logged in succesfully!\n";
} else {
    echo "Wrong Password\n";
}

if ($admin->login('password123')) {
    echo "Logged in succesfully!\n";
}

// Numeric array: list of users
/*
* Numeric array is useful if you want to loop through the array
* to perform a certain function or filter.
*/
$users = [
    new AdminUser('Alice', 'alice@example.com', 'password1'),
    new CustomerUser('Bob', 'bob@example.com', 'password2'),
];

//array_map
function myFunction($user)
{
  return $user->getEmail();
}

$userEmails = [];
$userEmails = array_map("myFunction", $users);
print_r($userEmails);

//array_filter
function IsCustomer($user)
{
  return($user instanceof CustomerUser);
}
$CustomerUsers = [];
$CustomerUsers = array_filter($users, "IsCustomer");
print_r($CustomerUsers);


// Associative array: list of users with the email as the key
/*
* Associative array is useful for fast lookup only through its key, 
* instead of having to loop through each data of the array
*/

$usersWithEmailKey = [];
foreach ($users as $user) {
    $usersWithEmailKey[$user->getEmail()] = $user;
}

// Use the function array_key_exists() to proof if a certain user exists
if (array_key_exists('alice@example.com', $usersWithEmailKey)) {
    echo "Alice Exists!\n";
}

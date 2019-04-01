<?php /** @noinspection ALL */

use App\Models\User;

require __DIR__ . '/../autoload.php';

$id = '1';
$user = User::findById($id);
assert($user instanceof User);
assert($id === $user->id);

$id = '42';
$user = User::findById($id);
assert(is_bool($user));
assert(false === $user);

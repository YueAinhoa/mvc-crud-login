<?php
require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/core/Database.php';

$db   = Database::connect();
$user = 'admin';
$pass = 'admin123';

$exists = $db->prepare('SELECT id FROM users WHERE username = ?');
$exists->execute([$user]);

if ($exists->fetch()) {
    exit("El usuario '$user' ya existe.\n");
}

$hash = password_hash($pass, PASSWORD_DEFAULT);

$db->prepare(
    'INSERT INTO users (username, password) VALUES (?, ?)'
)->execute([
    $user,
    $hash
]);

echo "Usuario creado: $user / $pass\n";
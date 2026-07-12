<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';

$security = new \yii\base\Security();
$hash = $security->generatePasswordHash('admin101');

$pdo = new PDO('mysql:host=localhost;dbname=yii2advanced;charset=utf8mb4', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->prepare("INSERT INTO user (username, auth_key, password_hash, email, status, created_at, updated_at) 
    VALUES (:username, :auth_key, :password_hash, :email, :status, :created_at, :updated_at)");

$stmt->execute([
    ':username' => 'admin',
    ':auth_key' => bin2hex(random_bytes(16)),
    ':password_hash' => $hash,
    ':email' => 'admin@example.com',
    ':status' => 10,
    ':created_at' => time(),
    ':updated_at' => time(),
]);

echo "Admin user created!\n";
<?php
$host = '127.0.0.1';
$port = 3306;
$db   = 'cw';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    error_log("DB connect error: " . $e->getMessage());
    http_response_code(500);
    exit("Không kết nối được DB. Kiểm tra user/pass/port/extension pdo_mysql.");
}
?>

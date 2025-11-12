<?php
require __DIR__ . '/../config/DatabaseConnection.php'; 
require __DIR__ . '/../helper/DatabaseFunction.php';

$users = get_users($pdo);

ob_start();
include __DIR__ . '/../views/users/index.html.php';  
$output = ob_get_clean();

include __DIR__ . '/../views/layouts/layout.html.php';
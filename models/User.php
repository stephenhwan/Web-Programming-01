<?php

require __DIR__ . '/includes/DatabaseConnection.php'; 
require __DIR__ . '/includes/DatabaseFunction.php';

$users = get_users($pdo);

ob_start();
include __DIR__ . '/templates/template_user/user.html.php';  
$output = ob_get_clean();

include __DIR__ . '/templates/layout.html.php';
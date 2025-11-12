<?php
require __DIR__ . '/../config/DatabaseConnection.php';
require __DIR__ . '/../helper/DatabaseFunction.php';

$modules = get_modules($pdo);
ob_start();
include __DIR__ . '/../views/modules/index.html.php';
$output = ob_get_clean();
include __DIR__ . '/../views/layouts/layout.html.php';
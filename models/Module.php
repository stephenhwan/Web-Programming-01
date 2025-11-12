<?php

require __DIR__ . '/includes/DatabaseConnection.php';
require __DIR__ . '/includes/DatabaseFunction.php';
$modules = get_modules($pdo);
ob_start();
include __DIR__ . '/templates/template_module/module.html.php';
$output = ob_get_clean();
include __DIR__ . '/templates/layout.html.php';
<?php
require __DIR__ . '/../config/DatabaseConnection.php';
require __DIR__ . '/../helper/DatabaseFunction.php';

$questions = get_questions($pdo);
ob_start();
include __DIR__ . '/../views/questions/index.html.php';
$output = ob_get_clean();
include __DIR__ . '/../views/layouts/layout.html.php';
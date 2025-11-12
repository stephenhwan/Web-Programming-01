<?php
require __DIR__ . '/includes/DatabaseConnection.php';
require __DIR__ . '/includes/DatabaseFunction.php';
$questions = get_questions($pdo);
ob_start();
include __DIR__ . '/templates/template_forum/forum.html.php';
$output = ob_get_clean();
include __DIR__ . '/templates/layout.html.php';


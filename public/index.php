<?php
$title = 'Internet Jokes Database';
ob_start();
include __DIR__ . '/../views/pages/home.html.php';
$output = ob_get_clean();
include __DIR__ . '/../views/layouts/layout.html.php';
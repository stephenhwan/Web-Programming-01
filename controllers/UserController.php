<?php

require __DIR__ . '/includes/DatabaseConnection.php';
require __DIR__ . '/includes/DatabaseFunction.php';


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');

    if ($username === '') {
        $message = 'Please enter username';
    } else {
        try {
            // Tạo user mới
            if (function_exists('create_user')) {
                create_user($pdo, ['username' => $username]);
            } else {
                insert_row($pdo, 'Users', ['username' => $username]);
            }
            
            // Set flash message
            $_SESSION['flash'] = 'User "' . htmlspecialchars($username) . '" created successfully!';
            
            // Redirect về user.php
            header('Location: user.php');
            exit;
            
        } catch (Exception $e) {
            $message = 'Error: ' . $e->getMessage();
        }
    }
}


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id = (int)($_GET['id'] ?? 0);
if ($id <= 0) {
    $_SESSION['flash'] = 'Invalid user ID';
    header('Location: user.php');
    exit;
}

$user = get_user_by_id($pdo, $id);
if (!$user) {
    $_SESSION['flash'] = 'User not found';
    header('Location: user.php');
    exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    
    if ($username === '') {
        $message = 'Username cannot be empty';
    } else {
        try {
            update_user($pdo, $id, ['username' => $username]);
            $_SESSION['flash'] = 'User updated successfully!';
            header('Location: user.php');
            exit;
        } catch (Exception $e) {
            $message = 'Error: ' . $e->getMessage();
        }
    }
}


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    $_SESSION['flash'] = 'Invalid user ID';
    header('Location: user.php');
    exit;
}

try {
    $deleted = delete_user($pdo, $id);
    if ($deleted > 0) {
        $_SESSION['flash'] = 'User deleted successfully!';
    } else {
        $_SESSION['flash'] = 'User not found';
    }
} catch (Exception $e) {
    $_SESSION['flash'] = 'Error: ' . $e->getMessage();
}

header('Location: user.php');
exit;
?>
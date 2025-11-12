<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>WEB PROGRAMMING 1</title>
</head>
<body>
    <header><h1>WEB PROGRAMMING 1</h1></header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="forum.php">Student Forum</a></li>
            <li><a href="addquestion.php">Add a question</a></li>
            <li><a href="user.php">User</a></li>
            <li><a href="module.php">Modules</a></li>
            <li><a href="">Contact Us</a></li>
        </ul>
    </nav>
    <main>
        <?php if (!empty($_SESSION['flash'])): ?>
        <div class="alert alert-success">
            <?= htmlspecialchars($_SESSION['flash']) ?>
        </div>
        <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>
        <?= $output ?? '' ?>
    </main>
    <footer>&copy; Stephenhwan2025</footer>
</body>
</html>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Wędkarskie</title>
    <link rel="stylesheet" href="/forum/css/style.css">
</head>
<body>
<header>
    <nav>
        <div class="nav-links">
        <a href="/forum/index.php" class="title-nav">ForumWędkarskie</a>
        <ul class="nav-list">
            <li><a class="nav-hover" href="/forum/index.php">Home</a></li>
            <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
                <li><a class="nav-hover" href="/forum/new_post.php">Add Post</a></li>
                <li class="nav-username">Witaj, <?php echo htmlspecialchars($_SESSION["username"]); ?> (<?php echo htmlspecialchars($_SESSION["email"]); ?>)</li>
                <li><a class="logout" href="/forum/logout.php">Logout</a></li>
            <?php else: ?>
                <li><a class="nav-hover" href="/forum/login.php">Login</a></li>
                <li><a class="nav-hover" href="/forum/register.php">Register</a></li>
            <?php endif; ?>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
            </div>
        
        <form action="/forum/index.php" method="get">
            <div class="nav-form">
            <input type="text" name="search" placeholder="Wyszukaj post...">
            <button type="submit" class="button-search">Szukaj</button>
            </div>
        </form>
        
    </nav>
    <script src="/forum/includes/header.js"></script>
</header>


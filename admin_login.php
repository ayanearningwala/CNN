<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - News Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="main-header">
        <div class="logo">CNN</div>
        <nav class="main-nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="article.php">Article</a></li>
                <li><a href="admin_login.php">Admin Login</a></li>
            </ul>
        </nav>
    </header>
    <div class="main-content">
        <div class="white-box">
            <h2>Admin Login</h2>
            <form action="admin_panel.php" method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>

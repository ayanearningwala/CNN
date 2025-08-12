<?php
require 'db.php';

// Get article details for editing
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM articles WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        die("Article not found!");
    }
}

// Update article after form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $image_url = $_POST['image_url'];
    $category = $_POST['category'];

    $stmt = $pdo->prepare("UPDATE articles SET title = ?, description = ?, content = ?, image_url = ?, category = ? WHERE id = ?");
    $stmt->execute([$title, $description, $content, $image_url, $category, $_POST['id']]);

    header('Location: admin_panel.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Edit Article</h1>
        <nav><a href="admin_panel.php">Back to Admin Panel</a></nav>
    </header>
    <main>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?= $article['id'] ?>">

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($article['title']) ?>" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?= htmlspecialchars($article['description']) ?></textarea>

            <label for="content">Content:</label>
            <textarea id="content" name="content" required><?= htmlspecialchars($article['content']) ?></textarea>

            <label for="image_url">Image URL:</label>
            <input type="text" id="image_url" name="image_url" value="<?= htmlspecialchars($article['image_url']) ?>">

            <label for="category">Category:</label>
            <input type="text" id="category" name="category" value="<?= htmlspecialchars($article['category']) ?>">

            <button type="submit">Update Article</button>
        </form>
    </main>
</body>
</html>

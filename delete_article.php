<?php
require 'db.php';

// Delete article if ID is provided
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM articles WHERE id = ?");
    $stmt->execute([$_GET['id']]);

    header('Location: admin_panel.php');
    exit;
}
?>

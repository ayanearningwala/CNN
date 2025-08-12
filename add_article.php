<?php
include('db.php'); // Include the database connection file

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];

    // Simple validation to check if fields are not empty
    if (!empty($title) && !empty($content) && !empty($category)) {
        // Insert the article into the database
        $sql = "INSERT INTO articles (title, content, category) VALUES ('$title', '$content', '$category')";
        if (mysqli_query($conn, $sql)) {
            $success_message = "Article added successfully!";
        } else {
            $error_message = "Error: " . mysqli_error($conn);
        }
    } else {
        $error_message = "All fields are required!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Article</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            color: #333;
        }
        .form-container input, .form-container textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #d32f2f;
            border: none;
            color: white;
            font-size: 1.2rem;
            border-radius: 5px;
        }
        .form-container button:hover {
            background-color: #c62828;
            cursor: pointer;
        }
        .error-message, .success-message {
            color: red;
            text-align: center;
            font-size: 1rem;
        }
        .success-message {
            color: green;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Add Article</h2>

        <?php if (isset($error_message)) { ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php } ?>

        <?php if (isset($success_message)) { ?>
            <p class="success-message"><?php echo $success_message; ?></p>
        <?php } ?>

        <form method="POST" action="">
            <input type="text" name="title" placeholder="Article Title" required>
            <textarea name="content" rows="6" placeholder="Article Content" required></textarea>
            <input type="text" name="category" placeholder="Category" required>

            <button type="submit" name="submit">Add Article</button>
        </form>
    </div>

</body>
</html>

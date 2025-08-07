<?php
session_start();
include 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Insert post into DB
    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
    if (mysqli_query($conn, $sql)) {
        echo "Post added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!-- HTML Form for adding a post -->
<form method="POST">
    <input type="text" name="title" placeholder="Post Title" required>
    <textarea name="content" placeholder="Post Content" required></textarea>
    <button type="submit">Add Post</button>
</form>

<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

// Fetch the post to edit
$result = mysqli_query($conn, "SELECT * FROM posts WHERE id=$id");
$post = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<h2>Edit Post</h2>
<form method="POST">
    <input type="text" name="title" value="<?php echo $post['title']; ?>" required>
    <textarea name="content" required><?php echo $post['content']; ?></textarea>
    <button type="submit">Update Post</button>
</form>

<?php
session_start();
include 'db.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Fetch all posts
$result = mysqli_query($conn, "SELECT * FROM posts ORDER BY created_at DESC");
?>

<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
<a href="add_post.php">➕ Add New Post</a> | 
<a href="logout.php">Logout</a>
<hr>

<?php
while($row = mysqli_fetch_assoc($result)){
    echo "<h3>" . $row['title'] . "</h3>";
    echo "<p>" . $row['content'] . "</p>";
    echo "<a href='edit_post.php?id=".$row['id']."'>✏️ Edit</a> | ";
    echo "<a href='delete_post.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\");'>🗑️ Delete</a>";
    echo "<hr>";
}
?>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

    if(mysqli_query($conn, $sql)){
        header("Location: login.php");
        exit;
    }
    

}
?>
<!-- Registration Form -->
<form method="POST">
    <input name="username" placeholder="Username" required>
    <input name="password" type="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>
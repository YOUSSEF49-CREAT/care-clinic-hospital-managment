<link rel="stylesheet" href="../assets/style.css">
<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<h2>Login</h2>

<form method="POST" action="login_check.php">
    <input type="email" name="email" required><br><br>
    <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>

<p>Don’t have an account?<a href="register.php">Sign up</a></p>

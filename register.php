<link rel="stylesheet" href="../assets/style.css">
<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<h2>Sign Up</h2>

<form class="SignUp" method="POST" action="register_check.php">
    <input type="email" name="email" required><br><br>
    <input type="password" name="password" required><br><br>
    <button type="submit">Register</button>
</form>

<p>Already have an account?<a href="login.php">Login</a></p>

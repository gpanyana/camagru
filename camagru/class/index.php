<html>
<head lang="en">
        <meta charset="utf-8">
	<title>Welcome Camagru</title>
        <link rel="stylesheet" type="text/css" href="../css/header.css">
</head>
<body>
  <div class="header">
  <a href="#default" class="logo">Welcome to New Age Media</a>
  <br >
  <br >
  <div class="header-right">
    <a class="active" href="#home">Home</a>
    <a href="">About</a>
    <a href="../class/logout.php">FAQ</a>
  </div>
<br>
        <div class="login-container">
                <form method="POST" action="login.php">
                <input type="text" placeholder="Username" required>
                <input type="text" placeholder="Password" required>
                <input type="submit" name="login" value="Login">
                </form>
        </div>
</div>
<p><a href="forgot_password.php">Forgot Password?</a>
<p> If you are not a member, click link to <a href="create_account.php">Create Account.</a></p>
</body>
</html>
<?php
include('../class/DB.php');
include('../class/Login.php');

if (Login::isLoggedIn()) {
	echo 'Logged In';
	echo Login::isLoggedIn();
} else {
	echo 'Not Logged In';
}
?>
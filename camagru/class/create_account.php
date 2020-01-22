<?php
include('../class/DB.php');
if (isset($_POST['create_account'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$verify = sha1(time().$username);

	if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {
		if (strlen($password) <= 6) {
			if (preg_match('/[a-zA-Z0-9_]+/', $password)) {
				if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
					DB::query('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)', array(':username'=>$username, ':email'=>$email, ':password'=>password_hash($password, PASSWORD_BCRYPT)));
					$to = $email;
					$subject = "Email verification";
					$msg = "<a href=\"http://localhost/camagru/verify.php?verify=$verify\"> Please click on link to register account </a>";
					$headers = 'From: camagru.com' . "\r\n";
					$headers .= 'MIME-version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
					mail($to, $subject, $msg, $headers);
					header('location: create_account.php');
					echo "Successful";
				} else {echo "Invalid Email";}
			} else {echo "password not strong";}
		} else {echo "Password too short";}
	} else {echo "user exists";}
}
?>

<div class="header">
<a href="#default" class="logo">Register</a>
<h1>Register</h1>
<form action="create_account.php" method="post">
		<hr>
        <h3 font="arial"> Please fill in details below: </h3>
        Username: <br>
        <input type="text" name="username" placeholder="Enter Username" required><br>
        Email: <br>
        <input type="text" name="email" placeholder="Enter Email" required><br>
        Password: <br>
        <input type="password" name="password" placeholder="type in password" required><br>
        <br>
	<input type="submit" name="create_account" value="Create Account">
</form>

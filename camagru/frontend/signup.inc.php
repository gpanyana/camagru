<?php
require 'connection.php';

$username = $password = $verify = $email = $response = NULL;
    if (isset($_POST['signup_submit']))
    {
                                // Save user data to given variables
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $verify = $_POST['verify'];
                                // error handling users data
        if (!preg_match('/^[A-Za-z][A-Za-z0-9]{3,50}$/', $username))
            $response = "Invalid Username";
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $response = "Invalid Email";
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $response = "Invalid Email";
        elseif (strlen($password) < 5 && !preg_match('`[^A-Z]`',$password))
            $response = "Password should contain a min of 5 characters with atleast one uppercase";
        elseif (strcmp($conf_password, $password) != 0){
            $response = "Passwords don't match";
        }
        else
        {
                                // Creating hash password and token
            $token = bin2hex(random_bytes(15));
            $password = password_hash($password, PASSWORD_DEFAULT);
            // preparing the sql query with the connection to retrieve info from DATABASE
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = '$email'");
            // executing the query
            $stmt->execute();
            // checks for existing email / a user that uses the email thats applied.
            if($stmt->rowCount() > 0)
            {
                $response = "This email exists";
            }
            else
            {
                // SESSIONS are used to save the users info while logged in or to log in to the server. like cookies but cookie on browser
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['verified'] = false;
                // preparing sql connection to insert info into DATABASE
                $stmt = $conn->prepare("INSERT INTO `camagru`.`users` (username, email, pass, token) VALUES (:username, :email, :pass, :token)");
                // binds data to the prepare statement as parameters for database execution.
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':pass', $password);
                $stmt->bindParam(':token', $token);
                $stmt->execute();
                // Sending mail
                $stmt = verify_email($email, $token);
                $response = "Registration Successful, check your email for verification";
	    }
	}
    }
?>

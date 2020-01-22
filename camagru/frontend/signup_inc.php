<?php
require 'database.php';
require 'setup.php';
var_dump($_POST);
if (isset($_POST['email'])){
    echo "here";
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['passwrd'];
//    $passwordrpt = $_POST['passwrdrpt'];
//    print_r($_POST);
    // if ($password !== $password2){
    //     $_SESSION['errors'] = "Passwords do not match";
    //     header('Location: ../signup.php');
    //     //exit();
    //     return;
    // }
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $link = md5($username);
    try {
        $sqlinsert = "INSERT INTO users (username, email, passwd, link)
                    VALUES (?,?,?,?)";
        $statement = $db->prepare($sqlinsert);
        $statement->execute([$username, $email, $password, $link]);
        //header("Location: ../login.php");
//        if ($statement){
//            $to      = $email;
//            $subject = 'the subject';
//            $message = "<a href='http://localhost:8080/camagru/email_validation.php?link=$link'>Confirm Account</a>";
//          $headers = "MIME-Version: 1.0" . "\r\n";
//          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//           $headers .= 'From: <bikad58028@mailnet.top>' . "\r\n";
//           if(mail($to, $subject, $message, $headers))
            
//           echo "testmail";
//           echo "A verification email has been sent to $email";
//       }
        }
        catch (PDOException $ex){
        $result = "<p style='padding: 20px; color: red;'> An error occured: ".$ex->getMessage()." </p>";
    }
}
?>

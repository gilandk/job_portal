<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");

//If user Actually clicked register button
if (isset($_POST)) {

    //Escape Special Characters in String
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //Encrypt Password
    $epassword = base64_encode(strrev(md5($password)));

    //sql query to check user login
    $sql = "UPDATE users SET password='$epassword' WHERE email='$email' ";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        $_SESSION['forgotPassSuccess'] = true;
        header("Location: login-candidates.php");
        exit();
    } else {
        echo $conn->error;
    }
} else {
    //redirect them back to login page if they didn't click login button
    header("Location: login.php");
    exit();
}

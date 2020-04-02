<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");

if (isset($_POST['verify'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $code = $_POST['code'];

 $sql ="SELECT * FROM users WHERE email='$email' AND fpcode='$code'";
 $result = $conn->query($sql);

 if($result->num_rows == 1){
    $msg = "You may now change your password";
    echo "<script type='text/javascript'>
            alert('$msg');
            window.location.href='new-pass(user).php?mail=$email';
            </script>";
 }
 else{
    $msg = "Try Again";
    echo "<script type='text/javascript'>
            alert('$msg');
            window.location.href='act-code(user).php?mail=$email';
            </script>";
 }



}

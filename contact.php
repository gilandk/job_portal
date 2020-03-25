<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");

if (isset($_POST['send'])) {

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contact_us(fullname, email, contact, message) VALUES ('$fullname', '$email', '$contact', '$message')";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        $msg = "Successfully Sent!";
        echo "<script type='text/javascript'>
                alert('$msg');
                window.location.href='index.php';
                </script>";
    } else {
        $msg = "Failed!";
        echo "<script type='text/javascript'>
                alert('$msg');
                window.location.href='index.php';
                </script>";
    }
}

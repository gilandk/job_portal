<?php
require('../PHPMailer/PHPMailerAutoload.php');
require('../PHPMailer/credentials.php');


if (isset($_POST['send'])) {

    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                                // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $jobemail;            // SMTP username
    $mail->Password = $jobpassword;                         // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom($jobemail, 'DYCI-Job Portal (NO REPLY)');
    $mail->addAddress($email, 'DYCI-Job Portal (NO REPLY)');                  // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body    = $message;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        $msg = "Message could not be sent.!";
        echo "<script type='text/javascript'>
                alert('$msg');
                window.location.href='contactus.php';
                </script>";
    } else {
        $msg = "Successfully Sent!";
        echo "<script type='text/javascript'>
                alert('$msg');
                window.location.href='contactus.php';
                </script>";
    }
}

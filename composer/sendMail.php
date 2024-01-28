<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendMail() {
    $phpmailer = new PHPMailer(true);

    try {
        // Server settings
        $phpmailer->isSMTP();
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = '36185a5d893889';
        $phpmailer->Password = '6c3bf78b325c8d';

        // Sender and recipient settings
        $phpmailer->setFrom('your_email@example.com', 'Your Name');
        $phpmailer->addAddress('atikzvii@gmail.com', 'Recipient Name');

        // Email content
        $phpmailer->isHTML(true);
        $phpmailer->Subject = 'Test Email';
        $phpmailer->Body = 'This is a test email sent via Mailtrap.io';

        // Send the email
        $phpmailer->send();

        echo 'Email has been sent';
    } catch (Exception $e) {
        echo "Error: {$phpmailer->ErrorInfo}";
    }
}

// Call the function to send the email
sendMail();
?>

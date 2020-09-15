<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";  

class VerificationEmail {

    private $mailer;
    private $email;
    private $url;
    
    public function __construct() 
    {
        $this->mailer = new PHPMailer(true);
    }

    public function sendVerification($email, $url) {
    
        try {
            //Server settings
            // $this->SMTPDebug = SMTP::DEBUG_SERVER;   // Enable verbose debug output
            $this->mailer->SMTPDebug = 2;  // Other option for SMTPDebug              
            $this->mailer->isSMTP();                                            // Send using SMTP
            $this->mailer->Host       = 'smtp.gmail.com';  // gmail smpt / Add app password at @google.account.com / search for app
            $this->mailer->SMTPAuth   = true;                                   // Enable SMTP authentication
            $this->mailer->Username   = 'milos.glogovac.mailer@gmail.com';      // SMTP username
            $this->mailer->Password   = 'anpdmzitxvqkuahe';                               // SMTP password
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $this->mailer->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
            //Recipients
            $this->mailer->setFrom('admin@blogapp.com' , 'Blog App Admin');         
            $this->mailer->addAddress($email , 'Joe User');     // Add a recipient
            $this->mailer->addReplyTo('noreply@mail.com' , 'Noreply');
    
            // Content
            $this->mailer->isHTML(true);                                  // Set email format to HTML
            $this->mailer->Subject = 'Verification Email';
            $this->mailer->Body    = 'Please Click on link to verify registration' . '<br>' . $url;
            // $this->mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
            $this->mailer->send();
            echo 'Message has been sent';
    

    
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }   
}










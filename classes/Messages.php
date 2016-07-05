<?php
ob_start();
class Message
{
    // retrieve the form data
    public function GetFormData($name, $email, $phone, $subject, $message)
    {
        $this->SendEmail($name, $email, $phone, $subject, $message);
    }

    // send the mail with the values from the retrieved form data
    private function SendEmail($name, $email, $phone, $subject, $message)
    {
        $to = "itrytocode.dev@gmail.com";
        $from = $email;
        $reply = $email;
        $subjects = $subject;

        $headers = "From: " . $from . "\r\n";
        $headers .= "Reply-To: ". strip_tags($reply) . "\r\n\r\n";

        $messages= "Naam: " . $name . "\r\n" . "Email: " . $email . "\r\n" . "Telefoonnummer: " . $phone . "\r\n\r\n" . "Bericht:\r\n\r\n".$message;

        mail($to, $subjects, $messages, $headers);
        echo 'Bericht verzonden. U wordt zo snel mogelijk geholpen.';
        header( "Refresh: 3;url= ../index.php" );
    }
    
    public function NotLoggedIn()
    {
        header("Location: login.php");

        return "You're not loggedin yet. If you want to visit this page, please login.";
    }
}
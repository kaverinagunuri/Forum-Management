<?php

include 'connection.php';
if (isset($_POST['ForgotSubmit'])) {
    $ForgotEmail = mysqli_real_escape_string($link, $_POST['ForgotEmail']);
    $ForgotPassword = "SELECT FirstName,Password FROM UserData WHERE EmailId='" . $ForgotEmail . "' ";
    $Result = mysqli_query($link, $ForgotPassword);
    $Row = mysqli_fetch_assoc($Result);
    $RetrivePassword = $Row['Password'];
    $FirstName = $Row['FirstName'];
    if ($Row) {

        require_once('PHPMailer-master/class.phpmailer.php');
        include("PHPMailer-master/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

        $mail = new PHPMailer();

        $body = "The Password of " . $ForgotEmail . "is" . $RetrivePassword;
//$body             = eregi_replace("[\]",'',$body);
        $mail->IsSMTP(); // telling the class to use SMTP

        $mail->Host = "mail.gmail.com"; // SMTP server

        $mail->SMTPDebug = 0;                    
        $mail->SMTPAuth = true;                  // enable SMTP authentication

        $mail->SMTPSecure = "tls";                 // sets the prefix to the servier

        $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server

        $mail->Port = 587;                   // set the SMTP port for the GMAIL server

        $mail->Username = "kaveri.nagunuri@karmanya.co.in";  // GMAIL username

        $mail->Password = "K@veri2710";            // GMAIL password



        $mail->SetFrom('kaveri.nagunuri@karmanya.co.in', 'kaveri');
        $mail->AddReplyTo('kaveri.nagunuri@karmanya.co.in', 'kaveri');
        $mail->Subject = "PHPMailer Test Subject via smtp (Gmail), basic";
        $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
        $mail->MsgHTML($body);
        $address = "kaveri.nagunuri@karmanya.co.in";
        $mail->AddAddress($ForgotEmail, $FirstName);
//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
        if (!$mail->Send()) {

            $error.="Mailer Error: " . $mail->ErrorInfo;
        } else {

            $msg.="The password is sent to ur emailID";
        }
    }
}
?>

<?php

  include("connection.php");
require_once('PHPMailer-master/class.phpmailer.php');
include("PHPMailer-master/class.smtp.php"); 

    

if (isset($_POST['ForgotSubmit'])) {
    $ForgotEmail=$_POST['ForgotEmail'];
       
 $query = "SELECT * FROM usersData WHERE EmailId='" . mysqli_real_escape_string($link, $_POST['ForgotEmail']) . "'";
   // $Password= mysqli_query($link,$query); 
      $result=mysqli_query($link,$query);
           $results=mysqli_num_rows($result);
           echo $results;
} 
    if ($Password)
    {
    $mail = new PHPMailer();

    $body = "$Password";

    $mail->IsSMTP(); 

    $mail->Host = "mail.gmail.com"; 

    $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
// 1 = errors and messages
    $mail->SMTPAuth = true;                  // enable SMTP authentication

    $mail->SMTPSecure = "tls";                 // sets the prefix to the servier

    $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server

    $mail->Port = 587;                   // set the SMTP port for the GMAIL server

    $mail->Username = "kaveri.nagunuri@karmanya.co.in";  // GMAIL username

    $mail->Password = "K@veri2710";            // GMAIL password



    $mail->SetFrom('kaveri.nagunuri@karmanya.co.in', 'kaveri');
    $mail->AddReplyTo($ForgotEmail, "$ForgotEmail");
    $mail->Subject = "PHPMailer Test Subject via smtp (Gmail), basic";
    $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
    $mail->MsgHTML($body);
    $address = "kaveri.nagunuri@karmanya.co.in";
    $mail->AddAddress($address, "John Doe");
//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
    if (!$mail->Send()) {

        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {

        echo "The password is sent to ur emailID";
    }
  
}
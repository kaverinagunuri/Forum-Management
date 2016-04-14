<?php

require_once('PHPMailer-master/class.phpmailer.php');
include("PHPMailer-master/class.smtp.php");
$Mail = new PHPMailer();
$Body = "registration has been successfully completed";

$Mail->IsSMTP();
$Mail->Host = "mail.gmail.com";
$Mail->SMTPDebug = 0;
$Mail->SMTPAuth = true;
$Mail->SMTPSecure = "tls";
$Mail->Host = "smtp.gmail.com";
$Mail->Port = 587;
$Mail->Username = "kaveri.nagunuri@karmanya.co.in";
$Mail->Password = "K@veri2710";
$Mail->SetFrom('kaveri.nagunuri@karmanya.co.in', 'kaveri');
$Mail->AddReplyTo("kaveri.nagunuri@karmanya.co.in", "kaveri");
$Mail->Subject = "Registration Completed";
$Mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
$Mail->MsgHTML($Body);
$Address = mysqli_real_escape_string($Link, $_POST['EmailId']);
$Mail->AddAddress($Address, "Success");

if (!$Mail->Send()) {
    $Error.= "Mailer Error: " . $mail->ErrorInfo;
} else {
    $Message.="The password is sent to ur emailID";
}?>
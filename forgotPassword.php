<?php

include 'connection.php';
if (isset($_POST['ForgotSubmit'])) {
    $ForgotEmail = mysqli_real_escape_string($Link, $_POST['ForgotEmail']);
    $ForgotPassword = "SELECT FirstName,Password FROM UserData WHERE EmailId='" . $ForgotEmail . "' ";
    $Result = mysqli_query($Link, $ForgotPassword);
    $Row = mysqli_fetch_assoc($Result);
    $RetrivePassword = $Row['Password'];
    $FirstName = $Row['FirstName'];
    if ($Row) {

        require_once('PHPMailer-master/class.phpmailer.php');
        include("PHPMailer-master/class.smtp.php"); 
        $Mail = new PHPMailer();
       $Body = "The Password of " . $ForgotEmail . "is" . $RetrivePassword;
        $Mail->IsSMTP(); 
        $Mail->Host = "mail.gmail.com"; 
        $Mail->SMTPDebug = 0;                    
        $Mail->SMTPAuth = true; 
        $Mail->SMTPSecure = "tls"; 
        $Mail->Host = "smtp.gmail.com";
        $Mailail->Port = 587; 
        $Mail->Username = "kaveri.nagunuri@karmanya.co.in"; 
        $Mail->Password = "K@veri2710"; 
        $Mail->SetFrom('kaveri.nagunuri@karmanya.co.in', 'kaveri');
        $Mail->AddReplyTo('kaveri.nagunuri@karmanya.co.in', 'kaveri');
        $Mail->Subject = "Password For Forum-Management Website";
        $Mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
        $Mail->MsgHTML($Body);
        $Address = "kaveri.nagunuri@karmanya.co.in";
        $Mail->AddAddress($ForgotEmail, $FirstName);
        if (!$Mail->Send()) {

            $Error.="Mailer Error: " . $Mail->ErrorInfo;
        } else {

            $Message.="The password is sent to ur emailID";
        }
    }
    else{
        $Error.="Email is not registred under user";
    }
}
?>

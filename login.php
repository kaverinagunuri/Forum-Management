<?php

error_reporting(0);
session_start();
if ($_GET['logout'] == 1 AND $_SESSION['id']) {
    session_destroy();
    $msg = "you have been successfully logged out!";
}
include("connection.php");
if (isset($_POST['SignUp']) == "SignUp") {
    $error = "";
    
    if (!$_POST['FirstName']) {
        $error.="please enter the FirstName<br/>";
    }
    if (!$_POST['LastName']) {
        $error.="please enter the LastName<br/>";
    }
    if (!$_POST['EmailId'])
        $error.="please enter the email id <br/>";
    else if (!(filter_var($_POST['EmailId'], FILTER_VALIDATE_EMAIL)))
        $error.="please enter valid email id <br/>";
    if (!$_POST['Password'])
        $error.="please enter the Password <br/>";

    if (!$_POST['ConfirmPassword'])
        $error.="please enter the ConfirmPassword <br/>";
    else if ($_POST['Password'] != $_POST['ConfirmPassword'])
        $error.="please enter the ConfirmPassword same as Password <br/>";

    else if (!$_POST['Mobile'])
        $error.="please enter the Mobile <br/>";
   
    else {
        if (strlen($_POST['Password']) < 8)
            $error.="the length of pssword must be atleast 8 characters<br/>";
        if (!preg_match('`[A-Z]`', $_POST['Password']))
            $error.="password should contain atleast one Captial Letter <br/>";
    }
    if ($error)
        $error = "there were errors in your signup details<br/>" . $error;
    else {
       $query = "SELECT * FROM UserData WHERE EmailId='" . mysqli_real_escape_string($link, $_POST['EmailId']) . "'";
        $result = mysqli_query($link, $query);
        $results = mysqli_num_rows($result);
        if ($results)
            $error = "The email address is already registered .if U want to login IN?";
        else {
            $query = "INSERT INTO UserData (FirstName,LastName,EmailId,Mobile,Password) VALUES('" . ($_POST['FirstName']) . "','" . ($_POST['LastName']) . "','" . mysqli_real_escape_string($link, $_POST['EmailId']) . "','" . ($_POST['Mobile']) . "', '" . ($_POST['Password']) . "')";


            mysqli_query($link, $query);
            $msg.="you were successfully signed!";
            
        }
    }
}
 if(isset($_POST['Login']))
        { 
            if($_POST['Login']=="Login"){
            
        $x=mysqli_real_escape_string($link,$_POST['UserEmail']); 
        $y=($_POST['UserPassword']); 
        if(($x=="kaveri.nagunuri@karmanya.co.in") &&($y=="kaveri"))
        {
             session_unset();
            $_SESSION['id']=1; print_r($_SESSION);
        header("Location:Adminlogin_success.php");
        }
        else{
           $Credential="SELECT * FROM UserData WHERE EmailId='$x' AND Password='$y'";
          $result1=mysqli_query($link,$Credential);
            $row=mysqli_fetch_array($result1);
            if($row){
                 session_unset();
                $_SESSION['id']=$row['Id'];
                print_r($_SESSION);
                header("Location:UserLogin_success.php");
            }
            else{
                $error="we could not find a user with the email and password.Sign Up!!";
            }
            }
        }
        }
?>
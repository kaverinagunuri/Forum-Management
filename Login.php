<?php

include("connection.php");
error_reporting(0);
session_start();
if ($_GET['logout'] == 1 AND $_SESSION['id']) {
    session_destroy();
    $msg = "you have been successfully logged out!";
}

if (isset($_POST['SignUp']) == "SignUp") {
    $Error = "";

    if (!$_POST['FirstName'])
        $Error.="please enter the FirstName<br/>";
    else if (!preg_match('`[a-zA-Z]`', $_POST['FirstName']))
        $Error.="please enter the valid FirstName<br/>";
    else if (!$_POST['LastName'])
        $Error.="please enter the LastName<br/>";
    else if (!preg_match('`[a-zA-Z]`', $_POST['LastName']))
        $Error.="please enter the valid LastName<br/>";
    else if (!$_POST['EmailId'])
        $Error.="please enter the email id <br/>";
    else if (!(filter_var($_POST['EmailId'], FILTER_VALIDATE_EMAIL)))
        $Error.="please enter valid email id <br/>";
    else if (!$_POST['Password'])
        $Error.="please enter the Password <br/>";

    else if (!$_POST['ConfirmPassword'])
        $Error.="please enter the ConfirmPassword <br/>";
    else if ($_POST['Password'] != $_POST['ConfirmPassword'])
        $Error.="please enter the ConfirmPassword same as Password <br/>";

    else if (!$_POST['Mobile'])
        $Error.="please enter the Mobile <br/>";
    else if (!preg_match("/^[1-9][0-9]{9,9}$/", $_POST['Mobile']))
        $Error.="please enter valid mobile number <br/>";

    else {
        if (strlen($_POST['Password']) < 8)
            $Error.="the length of pssword must be atleast 8 characters<br/>";
        if (!preg_match('`[A-Z]`', $_POST['Password']))
            $Error.="password should contain atleast one Captial Letter <br/>";
    }
    if ($Error)
        $Error = "there were errors in your signup details<br/>" . $Error;
    else {
        $Query = "SELECT * FROM UserData WHERE EmailId='" . mysqli_real_escape_string($Link, $_POST['EmailId']) . "'";
        $Result = mysqli_query($Link, $Query);
        $Rows = mysqli_num_rows($Result);
        if ($Rows)
            $Error = "The email address is already registered .if U want to login IN?";
        else {
            $Query = "INSERT INTO UserData (FirstName,LastName,EmailId,Mobile,Password) VALUES('" . ($_POST['FirstName']) . "','" . ($_POST['LastName']) . "','" . mysqli_real_escape_string($Link, $_POST['EmailId']) . "','" . ($_POST['Mobile']) . "', '" . ($_POST['Password']) . "')";


            mysqli_query($Link, $Query);
            $Message.="you were successfully signed!";

            include 'PhpMailer.php';
        }
    }
}
if (isset($_POST['Login'])) {
    if ($_POST['Login'] == "Login") {
        $x = mysqli_real_escape_string($Link, $_POST['UserEmail']);
        $y = ($_POST['UserPassword']);
        if (($x == "kaveri.nagunuri@karmanya.co.in") && ($y == "kaveri")) {

            $_SESSION['id'] = 1;

            header("Location:AdminLogin_success.php");
        } else {
            if (!(filter_var($_POST['UserEmail'], FILTER_VALIDATE_EMAIL)))
                $Error.="please enter valid email id <br/>";

            $Credential = "SELECT * FROM UserData WHERE EmailId='$x' AND Password='$y'";
            $Result = mysqli_query($Link, $Credential);
            $Rows = mysqli_fetch_array($Result);

            if ($Rows) {

                session_unset();
                $_SESSION['id'] = $Rows['Id'];

                header("Location:UserLogin_success.php");
            } else {

                $Error.= "we could not find a user with the email and password.Sign Up!!";
            }
        }
    }
}
?>
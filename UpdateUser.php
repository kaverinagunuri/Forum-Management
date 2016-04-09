<?php

error_reporting(0);
include("connection.php");
if (isset($_POST['Update']) == "Update") {
    print_r($_SESSION);
    $error = "";

    if (!$_POST['AddressOne']) {
        $error.="please enter the AddressOne<br/>";
    }
    if (!$_POST['AddressTwo']) {
        $error.="please enter the AddressTwo<br/>";
    }
    if (!$_POST['City']) {
        $error.="please enter the City<br/>";
    }
    if (!$_POST['State']) {
        $error.="please enter the State<br/>";
    }
    if (!$_POST['Country']) {
        $error.="please enter the Country<br/>";
    }
    if (!$_POST['ZipCode']) {
        $error.="please enter the ZipCode<br/>";
    }

    if ($error)
        $error = "there were errors in your Update details<br/>" . $error;
    else {

        $UserQuery = 'UPDATE UserData SET AddressOne="' . ($_POST['AddressOne']) . '",AddressTwo="' . ($_POST['AddressTwo']) . '",City="' . ($_POST['City']) . '",State="' . ($_POST['State']) . '",Country="' . ($_POST['Country']) . '",ZipCode="' . ($_POST['ZipCode']) . '" WHERE Id="' . $_SESSION['id'] . '" LIMIT 1';

        if ($UserResult = mysqli_query($link, $UserQuery))
            $msg.="your Profile were successfully Updated!";
        $row = mysqli_fetch_array($UserResult);
        print_r($row);
    }
}
if (isset($_POST['ChangePassword']) == "ChangePassword") {
    $OldPassword = $_POST['OldPassword'];
   

    $NewPassword = $_POST['Password'];
    if (!$_POST['Password'])
        $error.="please enter the Password <br/>";

    if (!$_POST['ConfirmPassword'])
        $error.="please enter the ConfirmPassword <br/>";
    else if ($_POST['Password'] != $_POST['ConfirmPassword'])
        $error.="please enter the ConfirmPassword same as Password <br/>";
    else {
        if (strlen($_POST['Password']) < 8)
            $error.="the length of pssword must be atleast 8 characters<br/>";
        if (!preg_match('`[A-Z]`', $_POST['Password']))
            $error.="password should contain atleast one Captial Letter <br/>";
    }

    if ($error)
        $error = "there were errors in your signup details<br/>" . $error;
    else {
        $query = "SELECT * FROM UserData WHERE Password='" . mysqli_real_escape_string($link, $_POST['OldPassword']) ."'";
        $result = mysqli_query($link, $query);
        $results = mysqli_num_rows($result);
    
        if ($results) {
            $SetPasswordQuery = "UPDATE UserData SET Password='" . mysqli_real_escape_string($link, $_POST['Password']) . "'WHERE id='" . $_SESSION['id'] . "' LIMIT 1 ";
            $SetPasswordResult = mysqli_query($link, $SetPasswordQuery);
            $SetPasswordRow = mysqli_fetch_array($SetPasswordResult);
            $msg.="updated";
           
        } else {
            $error = "The email address is already registered .if U want to login IN?";
        }
    }

}
?>
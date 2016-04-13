<?php

error_reporting(0);
include("connection.php");
session_start();
$UserQuery = "SELECT * FROM UserData WHERE Id='" . $_SESSION['id'] . "' LIMIT 1";
$UserResult = mysqli_query($Link, $UserQuery);
$Row = mysqli_fetch_array($UserResult);
$UserName = $Row['FirstName'];
$UserLastName = $Row['LastName'];
$UserEmail = $Row['EmailId'];
$UserMobile = $Row['Mobile'];
$UserAdressOne = $Row['AddressOne'];

$UserAdressTwo = $Row['AddressTwo'];
$UserCity = $Row['City'];
$UserState = $Row['State'];
$UserCountry = $Row['Country'];
$UserZipCode = $Row['ZipCode'];





if (isset($_POST['Update']) == "Update") {

    $Error = "";

    if (!$_POST['AddressOne']) {
        $Error.="please enter the AddressOne<br/>";
    }
    if (!$_POST['AddressTwo']) {
        $Error.="please enter the AddressTwo<br/>";
    }
    if (!$_POST['City']) {
        $Error.="please enter the City<br/>";
    }
    if (!$_POST['State']) {
        $Error.="please enter the State<br/>";
    }
    if (!$_POST['Country']) {
        $Error.="please enter the Country<br/>";
    }
    if (!$_POST['ZipCode']) {
        $Error.="please enter the ZipCode<br/>";
    }

    if ($Error)
        $Error = "there were errors in your Update details<br/>" . $Error;
    else {

        $UserQuery = 'UPDATE UserData SET AddressOne="' . ($_POST['AddressOne']) . '",AddressTwo="' . ($_POST['AddressTwo']) . '",City="' . ($_POST['City']) . '",State="' . ($_POST['State']) . '",Country="' . ($_POST['Country']) . '",ZipCode="' . ($_POST['ZipCode']) . '" WHERE Id="' . $_SESSION['id'] . '" LIMIT 1';

        if ($UserResult = mysqli_query($Link, $UserQuery))
            $Message.="your Profile were successfully Updated!";
        $Row = mysqli_fetch_array($UserResult);
        print_r($Row);
    }
}
if (isset($_POST['ChangePassword']) == "ChangePassword") {
    $OldPassword = $_POST['OldPassword']; 
   
    $NewPassword = $_POST['Password'];
    if (!$_POST['Password'])
        $Error.="please enter the Password <br/>";

    if (!$_POST['ConfirmPassword'])
        $Error.="please enter the ConfirmPassword <br/>";
    else if ($_POST['Password'] != $_POST['ConfirmPassword'])
        $Error.="please enter the ConfirmPassword same as Password <br/>";
    else {
        if (strlen($_POST['Password']) < 8)
            $Error.="the length of pssword must be atleast 8 characters<br/>";
        if (!preg_match('`[A-Z]`', $_POST['Password']))
            $Error.="password should contain atleast one Captial Letter <br/>";
    }

    if ($Error)
        $Error = "there were errors in your signup details<br/>" . $Error;
    else {

        $Query = "SELECT * FROM UserData WHERE Password='" . ($_POST['OldPassword']) . "'";
        $Result = mysqli_query($Link, $Query);
        $Rows = mysqli_num_rows($Result);

        if ($Rows) {
            $SetPasswordQuery = "UPDATE UserData SET Password='" . ($_POST['Password']) . "'WHERE id='" . $_SESSION['id'] . "' LIMIT 1 ";
            $SetPasswordResult = mysqli_query($Link, $SetPasswordQuery);
            $SetPasswordRow = mysqli_fetch_array($SetPasswordResult);
            $Message.="updated";
        } else {
            $Error = "error in Upating pasword?";
        }
    }
}


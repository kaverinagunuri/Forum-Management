<?php

error_reporting(0);
include("connection.php");
if (isset($_POST['Update']) == "Update") {
    $Error = "";
    if (!$_POST['AddressOne'])
        $Error.="please enter the LastName<br/>";
    else if (!preg_match('`[a-zA-Z]`', $_POST['AddressOne']))
        $Error.="please enter the valid LastName<br/>";
    else if (!$_POST['AddressOne'])
        $Error.="please enter the AdressOne<br/>";
    else if (!$_POST['AddressTwo'])
        $Error.="please enter the LastName<br/>";
    else if (!$_POST['City'])
        $Error.="please enter the City<br/>";
    else if (!preg_match('`[a-zA-Z]`', $_POST['City']))
        $Error.="please enter the valid City<br/>";
    else if (!$_POST['State'])
        $Error.="please enter the State<br/>";
    else if (!preg_match('`[a-zA-Z]`', $_POST['State']))
        $Error.="please enter the valid State<br/>";
    elseif (!$_POST['Country'])
        $Error.="please enter the Country<br/>";
    else if (!preg_match('`[a-zA-Z]`', $_POST['Country']))
        $Error.="please enter the valid City<br/>";
    else {
        if (!$_POST['ZipCode'])
            $Error.="please enter the ZipCode<br/>";
    }
    if ($Error)
        $Error = "there were errors in your Update details<br/>" . $Error;
    else {
        $UserQuery = 'UPDATE UserData SET AddressOne="' . ($_POST['AddressOne']) . '",AddressTwo="' . ($_POST['AddressTwo']) . '",City="' . ($_POST['City']) . '",State="' . ($_POST['State']) . '",Country="' . ($_POST['Country']) . '",ZipCode="' . ($_POST['ZipCode']) . '" WHERE Id="' . $_SESSION['id'] . '" LIMIT 1';
        if ($UserResult = mysqli_query($Link, $UserQuery))
            $msg.="your Profile were successfully Updated!";
        $row = mysqli_fetch_array($UserResult);
        print_r($row);
    }
}
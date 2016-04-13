
<?php
include("connection.php");
include("Login.php");

session_start();
$AdminQuery = "SELECT AdminName FROM Admin WHERE Id='" . $_SESSION['id'] . "' LIMIT 1";
$Result = mysqli_query($Link, $AdminQuery);
$Row = mysqli_fetch_array($Result);
$AdminName = $Row['AdminName'];




if (isset($_POST['Add-User']) == "Add-User") {
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
    else if (!$_POST['AddressOne'])
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

    else if (!$_POST['ZipCode'])
        $Error.="please enter the ZipCode<br/>";
    else {
        if (strlen($_POST['Password']) < 8)
            $Error.="the length of pssword must be atleast 8 characters<br/>";
        if (!preg_match('`[A-Z]`', $_POST['Password']))
            $Error.="password should contain atleast one Captial Letter <br/>";
    }

    if ($Error)
        $Error = "there were errors in your Registration details<br/>" . $Error;
    else {
        $Query = "SELECT * FROM UserData WHERE EmailId='" . mysqli_real_escape_string($Link, $_POST['EmailId']) . "'";
        $Result = mysqli_query($Link, $Query);
        $Row = mysqli_num_rows($Result);
        if ($Row)
            $Error = "The email address is already registered .Create with different ";
        else {
            $Query = "INSERT INTO UserData (FirstName,LastName,EmailId,Mobile,Password,AddressOne,AddressTwo,City,State,Country,Zipcode) VALUES('" . ($_POST['FirstName']) . "','" . ($_POST['LastName']) . "','" . mysqli_real_escape_string($Link, $_POST['EmailId']) . "','" . ($_POST['Mobile']) . "', '" . ($_POST['Password']) . "','" . ($_POST['AddressOne']) . "','" . ($_POST['AddressTwo']) . "','" . ($_POST['City']) . "','" . ($_POST['State']) . "','" . ($_POST['Country']) . "','" . ($_POST['ZipCode']) . "')";


            mysqli_query($Link, $Query);
            $Message.="User has been successfully registered!";
        }
    }
}




if (isset($_POST['Update-User']) == "Update-User") {

    $Error = "";

    if (!$_POST['Mobile'])
        $Error.="please enter the Mobile <br/>";
    else if (!preg_match("/^[1-9][0-9]{9,9}$/"))
        $Error.="please enter valid mobile number <br/>";

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

        $UserQuery = 'UPDATE UserData SET Mobile="' . ($_POST['Mobile']) . '",AddressOne="' . ($_POST['AddressOne']) . '",AddressTwo="' . ($_POST['AddressTwo']) . '",City="' . ($_POST['City']) . '",State="' . ($_POST['State']) . '",Country="' . ($_POST['Country']) . '",ZipCode="' . ($_POST['ZipCode']) . '" WHERE Id="' . $_GET['Id'] . '" LIMIT 1';

        if ($UserResult = mysqli_query($Link, $UserQuery))
            $Message.="your Profile were successfully Updated!";
        $Row = mysqli_fetch_array($UserResult);
    }
}





if (isset($_POST['Delete-Profile'])) {
    $DeleteQuery = 'DELETE FROM UserData WHERE Id="' . $_GET['Id'] . '" LIMIT 1';
    $DeleteResult = mysqli_query($Link, $DeleteQuery);
    if ($DeleteResult)
        $Message.="Your Profile Has beeen Successfully deleted.";
}
?>
</head>
<body>

</body>
</html>
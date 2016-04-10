
        <?php




include("connection.php");
if (isset($_POST['Add-User']) == "Add-User") {
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
        $error = "there were errors in your signup details<br/>" . $error;
    else {
       $query = "SELECT * FROM UserData WHERE EmailId='" . mysqli_real_escape_string($link, $_POST['EmailId']) . "'";
        $result = mysqli_query($link, $query);
        $results = mysqli_num_rows($result);
        if ($results)
            $error = "The email address is already registered .Create with different ";
        else {
            $query = "INSERT INTO UserData (FirstName,LastName,EmailId,Mobile,Password,AddressOne,AddressTwo,City,State,Country,Zipcode) VALUES('" . ($_POST['FirstName']) . "','" . ($_POST['LastName']) . "','" . mysqli_real_escape_string($link, $_POST['EmailId']) . "','" . ($_POST['Mobile']) . "', '" . ($_POST['Password']) . "','" . ($_POST['AddressOne']) . "','" . ($_POST['AddressTwo']) . "','" . ($_POST['City']) . "','" . ($_POST['State']) . "','" . ($_POST['Country']) . "','" . ($_POST['ZipCode']) . "')";


            mysqli_query($link, $query);
            $msg.="you were successfully signed!";
            
        }
    }
}
?>
</head>
<body>
   
</body>
</html>
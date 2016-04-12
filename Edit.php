<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login-Success</title>


        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <script src="js/jquery-2.2.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/validation.js"></script>
    </head>
    <?php
    include 'Login.php';
    include 'AdminSql.php';

    $UserQuery = "SELECT * FROM UserData WHERE Id='" . $_GET['Id'] . "' LIMIT 1";
    $UserResult = mysqli_query($link, $UserQuery);
    $row = mysqli_fetch_array($UserResult);
    $UserName = $row['FirstName'];
    $UserLastName = $row['LastName'];
    $UserEmail = $row['EmailId'];
    $UserMobile = $row['Mobile']
    ?>




    <div class="nav navbar-default">

        <div class="container">

            <div class="navbar-header">

                <a href="" class="navbar-brand"><h4>Update Profile</h4></a>

                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".navbar-collapse">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>


                </button>

            </div>

            <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav">

                    <li class="active"><a href="AdminLoginJS.php"> DashBoard</a></li>

                    <li><a href="AdminUser.php">Users</a></li>

                    <li><a href="index.php?logout=1">Logout</a></li>

                </ul>
                <div class="navbar-form navbar-right">
                    <div class="sign">
                        <img src="images/sign.jpeg" />
<?php
echo $AdminName;
?>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <div class="container UserContainer">
<?php
if ($error) {
    echo '<div class="alert alert-danger">' . addslashes($error) . '</div>';
}
if ($msg) {
    echo '<div class="alert alert-success">' . addslashes($msg) . '</div>';
}
?>
        <h3 >Update Profile</h3>
        <div class="container childContainer col-md-10"> 

            <form class="form-group"  id="UserProfile" method="post" enctype="multipart/form-data" >

                <div class="col-md-6 col-offset-3 marginTop">
                    <label for="FirstName"> FirstName</label>
                    <input type="text" id="FirstName" name="FirstName" placeholder="Firstname" class="form-control " readonly value="<?php echo $UserName; ?>"/>
                </div>
                <div class="col-md-6 col-offset-3 marginTop">
                    <label for="LastName">LastName</label>
                    <input type="text" id="LastName" name="LastName" placeholder="LastName" class="form-control" readonly value="<?php echo $UserLastName; ?>"/>
                </div>





                <div class="col-md-6 col-offset-3 marginTop">
                    <span class="form-group-addon">@</span>
                    <label for=EmailId>Email Id</label>
                    <input type="email" id="EmailId" name="EmailId" placeholder="emailId" class="form-control " readonly value="<?php echo $UserEmail; ?>" />
                </div>
                <div class="col-md-6 col-offset-3 marginTop">
                    <span class="form-group-addon glyphicon glyphicon-phone "></span>
                    <label for="Mobile">Mobile-Num</label>
                    <input type="text" id="Mobile" name="Mobile" placeholder="Mobile number" maxlength="10" class="form-control" pattern="[0-9]{10}" required oninvalid="setCustomValidity('Plz enter on valid MobileNumber')" oninput="setCustomValidity('')" title="Mobile number should be 10 digit number" />

                </div>
                <div class="col-md-6 col-offset-3 marginTop">
                    <span class="form-group-addon glyphicon glyphicon-map "></span>
                    <label for="AddressOne">Address Line 1</label>
                    <textarea id="AddressOne" name="AddressOne" maxlength="500" required oninvalid="setCustomValidity('Plz enter on valid Address 1 Mandaitory')"  oninput="setCustomValidity('')"></textarea>
                </div>

                <div class="col-md-6 col-offset-3 marginTop">
                    <span class="form-group-addon glyphicon glyphicon-map "></span>
                    <label for="AddressTwo">Address Line 2</label>
                    <textarea id="AddressTwo" name="AddressTwo" maxlength="500" required oninvalid="setCustomValidity('Plz enter on valid Address2 Mandaitory')"  oninput="setCustomValidity('')"></textarea>
                </div>
                <div class="col-md-6 col-offset-3 marginTop">
                    <span class="form-group-addon glyphicon glyphicon-map "></span>
                    <label for="City">City</label>
                    <input type="text" id="City" name="City" class="form-control" pattern="[a-zA-Z]+" required oninvalid="setCustomValidity('Plz enter on City')" oninput="setCustomValidity('')" title="City Name Should be Mandaitory" />

                </div>
                <div class="col-md-6 col-offset-3 marginTop">
                    <span class="form-group-addon glyphicon glyphicon-map "></span>
                    <label for="State">State</label>
                    <input type="text" id="State" name="State" class="form-control" pattern="[a-zA-Z]+" required oninvalid="setCustomValidity('Plz enter on State')" oninput="setCustomValidity('')" title="State Name Should be Mandaitory" />

                </div>
                <div class="col-md-6 col-offset-3 marginTop">
                    <span class="form-group-addon glyphicon glyphicon-map "></span>
                    <label for="Country">Country</label>
                    <input type="text" id="Country" name="Country" class="form-control" pattern="[a-zA-Z]+" required oninvalid="setCustomValidity('Plz enter on Country')" oninput="setCustomValidity('')" title="Country Name Should be Mandaitory" />

                </div>
                <div class="col-md-6 col-offset-3 marginTop">
                    <span class="form-group-addon glyphicon glyphicon-map "></span>
                    <label for="ZipCode">ZipCode</label>
                    <input type="text" id="ZipCode" name="ZipCode" class="form-control" pattern="[0-9]{6}" required oninvalid="setCustomValidity('Plz enter on ZipCode')" oninput="setCustomValidity('')" title="ZipCode Should be 6 digits valid postal code " />

                </div>
                <div class="col-md-6 col-offset-3 marginTop">
                    <input type="submit" class="btn btn-success btn-lg" value="Update-User" name="Update-User" id="Update-User"/></div>

            </form></div>
    </div>

</body>
<script src="js/bootstrap.min.js"></script>
<script>

    $(".UserContainer").css("min-height", $(window).height() - 50);
</script>
</html>

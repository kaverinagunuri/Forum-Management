<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Profile</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <script src="js/jquery-2.2.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/validation.js"></script>
    </head>
    <?php
    //include 'Login.php';
    include 'UpdateUser.php';
    session_start();
    $Id = $_SESSION['id'];
    if (!$Id) {
        header("Location:index.php");
    }
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
                    <li><a href="UserLogin.php"> DashBoard</a></li>
                    <li class="active"><a href="UserProfile.php"><span class="glyphicon glyphicon-user">My Profile</span></a></li>
                    <li><a href="ChangePassword.php"><span class="glyphicon glyphicon-pencil">Change Password</span></a></li>
                    <li><a href="ViewProfile.php"> <span class="glyphicon glyphicon-eye-open">View Profile</span></a></li>
                    <li><a href="index.php?logout=1"><span class="glyphicon glyphicon-off">Logout</span></a></li>
                </ul>
                <div class="navbar-form navbar-right">
                    <div class="sign">
                        <img src="images/sign.jpeg" />
                        <?php
                        echo $UserName;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container UserContainer">
        <?php
        if ($Error) {
            echo '<div class="alert alert-danger">' . addslashes($Error) . '</div>';
        }
        if ($Message) {
            echo '<div class="alert alert-success">' . addslashes($Message) . '</div>';
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
                    <input type="text" id="Mobile" name="Mobile" placeholder="Mobile number" maxlength="10" class="form-control" readonly value="<?php echo $UserMobile ?>" />
                </div>
                <div class="col-md-6 col-offset-3 marginTop">
                    <span class="form-group-addon glyphicon glyphicon-map "></span>
                    <label for="AddressOne">Address Line 1</label>
                    <textarea id="AddressOne" name="AddressOne" maxlength="500  " placeholder="AddressOne" required oninvalid="setCustomValidity('Plz enter on valid Address 1 Mandaitory')"  oninput="setCustomValidity('')"> <?php echo $UserAdressOne ?></textarea>
                </div>
                <div class="col-md-6 col-offset-3 marginTop">
                    <span class="form-group-addon glyphicon glyphicon-map "></span>
                    <label for="AddressTwo">Address Line 2</label>
                    <textarea id="AddressTwo" name="AddressTwo" maxlength="500" placeholder="AddressTwo" required oninvalid="setCustomValidity('Plz enter on valid Address2 Mandaitory')"  oninput="setCustomValidity('')"> <?php echo $UserAdressTwo ?></textarea>
                </div>
                <div class="col-md-6 col-offset-3 marginTop">
                    <span class="form-group-addon glyphicon glyphicon-map "></span>
                    <label for="City">City</label>
                    <input type="text" id="City" name="City" placeholder="City" class="form-control" value="<?php echo $UserCity ?>" pattern="[a-zA-Z ]+" required oninvalid="setCustomValidity('Plz enter on City')" oninput="setCustomValidity('')" title="City Name Should be Mandaitory" /> 
                </div>
                <div class="col-md-6 col-offset-3 marginTop">
                    <span class="form-group-addon glyphicon glyphicon-map "></span>
                    <label for="State">State</label>
                    <input type="text" id="State" name="State" placeholder="State" class="form-control" value="<?php echo $UserState ?>" pattern="[a-zA-Z ]+" required oninvalid="setCustomValidity('Plz enter on State')" oninput="setCustomValidity('')" title="State Name Should be Mandaitory" />
                </div>
                <div class="col-md-6 col-offset-3 marginTop">
                    <span class="form-group-addon glyphicon glyphicon-map "></span>
                    <label for="Country">Country</label>
                    <input type="text" id="Country" placeholder="Country" name="Country" class="form-control" value="<?php echo $UserCountry ?>" pattern="[a-zA-Z ]+" required oninvalid="setCustomValidity('Plz enter on Country')" oninput="setCustomValidity('')" title="Country Name Should be Mandaitory" />
                </div>
                <div class="col-md-6 col-offset-3 marginTop">
                    <span class="form-group-addon glyphicon glyphicon-map "></span>
                    <label for="ZipCode">ZipCode</label>
                    <input type="text" id="ZipCode" name="ZipCode" placeholder="ZipCode" class="form-control" value="<?php echo $UserZipCode ?>" pattern="[0-9]{6}" required oninvalid="setCustomValidity('Plz enter on ZipCode')" oninput="setCustomValidity('')" title="ZipCode Should be 6 digits valid postal code " />
                </div>
                <div class="col-md-6 col-offset-3 marginTop">
                    <input type="submit" class="btn btn-success btn-lg" value="Update" name="Update" id="Update"/></div>
            </form></div>
    </div>
</body>
<script src="js/bootstrap.min.js"></script>
<script>
    $(".UserContainer").css("min-height", $(window).height() - 50);
</script>
</html>

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
    include 'UpdateUser.php';
    
    ?>
    <body>



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

                        <li><a href="UserProfile.php">My Profile</a></li>

                        <li ><a href="ChangePassword.php">Change Password</a></li>
                        <li class="active"><a href="ViewProfile.php"> View Profile</a></li>
                        <li><a href="index.php?logout=1">Logout</a></li>

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

    </div>
    <div class="container UserContainer">

        <h3 >View Profile</h3>
        <div class="container childContainer col-md-10"> 

            <form class="form-group"  id="ViewProfile" method="post" enctype="multipart/form-data" >

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
                    <textarea id="AddressOne" name="AddressOne" maxlength="500" class="form-control" readonly ><?php echo $UserAdressOne; ?></textarea>

                </div>

                <div class="col-md-6 col-offset-3 marginTop">
                    <span class="form-group-addon glyphicon glyphicon-map "></span>
                    <label for="AddressTwo">Address Line 2</label>
                    <textarea id="AddressTwo" name="AddressTwo" maxlength="500" class="form-control" readonly ><?php echo $UserAdressTwo; ?></textarea>
                </div>
                <div class="col-md-6 col-offset-3 marginTop">
                    <span class="form-group-addon glyphicon glyphicon-map "></span>
                    <label for="City">City</label>
                    <input type="text" id="City" name="City" class="form-control" readonly value="<?php echo $UserCity ?>" />

                </div>
                <div class="col-md-6 col-offset-3 marginTop">
                    <span class="form-group-addon glyphicon glyphicon-map "></span>
                    <label for="State">State</label>
                    <input type="text" id="State" name="State" class="form-control" readonly value="<?php echo $UserState ?>" />

                </div>
                <div class="col-md-6 col-offset-3 marginTop">
                    <span class="form-group-addon glyphicon glyphicon-map "></span>
                    <label for="Country">Country</label>
                    <input type="text" id="Country" name="Country"class="form-control" readonly value="<?php echo $UserCountry ?>" />

                </div>
                <div class="col-md-6 col-offset-3 marginTop">
                    <span class="form-group-addon glyphicon glyphicon-map "></span>
                    <label for="ZipCode">ZipCode</label>
                    <input type="text" id="ZipCode" name="ZipCode" class="form-control" readonly value="<?php echo $UserZipCode ?>" />
                  
                    <a href="#" class="read" data-toggle="modal" data-target="#myModal" >Click Here to view location</a>
                </div>

            </form></div>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <h4 class="modal-title">Location</h4>
                </div>
                <div class="modal-body">
                    <?php
                    include "USerMap.php";
                    ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>




</body>

<script>

    $(".UserContainer").css("min-height", $(window).height() - 50);
</script>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DASH BOARD</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <script src="js/jquery-2.2.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/validation.js"></script>
    </head>
    <?php
    // include 'Login.php';
    include 'UpdateUser.php';
    session_start();
    $Id = $_SESSION['id'];
    if (!$Id) {
        header("Location:index.php");
    }
    ?>
    <body data-type="scroll" >
        <div class="nav navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <a href="" class="navbar-brand"><h4>DashBoard</h4></a>
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
                        <li class="active"><a href=""> DashBoard</a></li>
                        <li><a href="UserProfile.php"><span class="glyphicon glyphicon-user">My Profile</span></a></li>
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
        <div class="container UserContainer"></div>
        <div class="container">
            <div class="row ">
                <div class="col-md-4">
                    <h3><span class="glyphicon glyphicon-knight"></span>origin</h3>
                    <p>Bootstrap, originally named Twitter Blueprint, was developed by Mark Otto and Jacob Thornton at Twitter as a framework to encourage consistency across internal tools. Before Bootstrap,
                        various libraries were used for interface development, which led to inconsistencies and a high maintenance burden.</p> 
                </div>
                <div class="col-md-4">
                    <h3><span class="glyphicon glyphicon-phone"></span>Structure</h3>
                    <p>Bootstrap is modular and consists essentially of a series of LESS stylesheets that implement the various components of the toolkit. A stylesheet called bootstrap.less includes the components stylesheets. 
                        Developers can adapt the Bootstrap file itself, selecting the components they wish to use in their project.</p> 
                </div>
                <div class="col-md-4">
                    <h3><span class="glyphicon glyphicon-cloud"></span>origin</h3>
                    <p>Bootstrap, originally named Twitter Blueprint, was developed by Mark Otto and Jacob Thornton at Twitter as a framework to encourage consistency across internal tools. Before Bootstrap,
                        various libraries were used for interface development, which led to inconsistencies and a high maintenance burden.</p> 
                </div></div>
        </div>
    </body>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(".UserContainer").css("min-height", $(window).height() - 100);
    </script>
</html>
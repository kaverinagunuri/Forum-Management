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
    $AdminQuery = "SELECT AdminName FROM Admin WHERE Id='" . $_SESSION['id'] . "' LIMIT 1";
    $result = mysqli_query($link, $AdminQuery);
    $row = mysqli_fetch_array($result);
    $AdminName = $row['AdminName'];
       
 $UserQuery="SELECT * FROM UserData WHERE Id='".$_GET['Id']."' LIMIT 1";
           $UserResult=mysqli_query($link,$UserQuery);
           $row=mysqli_fetch_array($UserResult);
          $UserEmail=$row['EmailId'];
    
    ?>
    <body>


 <div class="nav navbar-default">

            <div class="container">

                <div class="navbar-header">

                    <a href="" class="navbar-brand"><h4>Delete Profile</h4></a>

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

                       <li class="active"><a href="AdminLogin.php"> DashBoard</a></li>

                        <li><a href="AdminUser.php">Users</a></li>

                        <li><a href="index.php?logout=1">Logout</a></li>

                    </ul>
                    <div class="navbar-form navbar-right">
                        <?php
                        echo $AdminName;
                        ?>
                    </div>
                 
                </div>
                
            </div>

        </div>
      <div class="container UserContainer">
           <?php
                    if($error)
                    {
                        echo '<div class="alert alert-danger">'.addslashes($error).'</div>';
                    }
                    if($msg)
                    {
                        echo '<div class="alert alert-success">'.addslashes($msg).'</div>';
                    }
                    
                    
                    
                    ?>
            <h3 >Delete Profile</h3>
            <div class="container childContainer col-md-6 col-offset-3"> 
                <form class="form-group"  id="DeleteProfile" method="post" enctype="multipart/form-data" > 
                    <div class="col-md-12 col-offset-3 marginTop">
                        <span class="form-group-addon">@</span>
                        <label for=EmailId>Email Id</label>
                        <input type="email" id="EmailId" name="EmailId" placeholder="emailId" class="form-control " readonly value="<?php echo $UserEmail; ?>" />
                    </div>
                   
                    <div class="col-md-6 col-offset-3 marginTop">
                        <input type="submit" class="btn btn-success btn-lg" value="Delete-Profile" name="Delete-Profile" id="Delete-Profile"/></div>

                </form>
            </div>
        </div>
    </body>
    <script src="js/bootstrap.min.js"></script>
    <script>

                            $(".UserContainer").css("min-height", $(window).height() - 50);
    </script>
</html>

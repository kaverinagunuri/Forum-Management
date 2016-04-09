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
   
 include 'login.php';
 //print_r($_SESSION);
 $UserQuery="SELECT * FROM UserData WHERE id='".$_SESSION['id']."' LIMIT 1";
           $UserResult=mysqli_query($link,$UserQuery);
           $row=mysqli_fetch_array($UserResult);
          $UserName=$row['FirstName'];
          $UserLastName=$row['LastName'];
          $UserEmail=$row['EmailId'];
          $UserMobile=$row['Mobile']
          
          
       
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

                        <li class="active"><a href="UserLogin.php"> DashBoard</a></li>

                        <li><a href="UserProfile.php">My Profile</a></li>

                        <li><a href="ChangePassword.php">Change Password</a></li>
                         <li><a href="ViewProfile"> View Profile</a></li>
                          <li><a href="Logout">Logout</a></li>

                    </ul>
                    <div class="navbar-form navbar-right">
                        <?php
                      echo $UserName;
                       ?>
                    </div>
                 
                </div>
                
            </div>

        </div>
      <div class="container UserContainer">
          <h3 class="center">Update Profile</h3>
      <div class="container childContainer col-md-10"> 
           
            <form class="form-group"  id="registration" method="post" enctype="multipart/form-data" >
              
                    <div class="col-md-6 col-offset-3 marginTop">
                        <label for="FirstName"> FirstName</label>
                        <input type="text" id="FirstName" name="FirstName" placeholder="Firstname" class="form-control " readonly value="<?php echo $UserName;?>"/>
                    </div>
                        <div class="col-md-6 col-offset-3 marginTop">
                        <label for="LastName">LastName</label>
                        <input type="text" id="LastName" name="LastName" placeholder="LastName" class="form-control" readonly value="<?php echo $UserLastName; ?>"/>
                    </div>
           



             
                    <div class="col-md-6 col-offset-3 marginTop">
                        <span class="form-group-addon">@</span>
                        <label for=EmailId>Email Id</label>
                        <input type="email" id="EmailId" name="EmailId" placeholder="emailId" class="form-control " readonly value="<?php echo $UserEmail;?>" />
                    </div>
                 <div class="col-md-6 col-offset-3 marginTop">
                        <span class="form-group-addon glyphicon glyphicon-phone "></span>
                        <label for="Mobile">Mobile-Num</label>
                        <input type="text" id="Mobile" name="Mobile" placeholder="Mobile number" maxlength="10" class="form-control" readonly value="<?php echo $UserMobile?>" />

                 </div>
                    <div class="col-md-6 col-offset-3 marginTop">
                        <span class="form-group-addon glyphicon glyphicon-phone "></span>
                        <label for="AddressOne">Address Line 1</label>
                        <textarea id="AddressOne" name="AddressOne" maxlength="500" required oninvalid="setCustomValidity('Plz enter on valid Address')"  oninput="setCustomValidity('')"></textarea>
                 </div>
      
      
      
      
      
      
      
      </div></div>
      
  </body>
  <script src="js/bootstrap.min.js"></script>
        <script>

            $(".UserContainer").css("min-height", $(window).height()-50);
        </script>
</html>

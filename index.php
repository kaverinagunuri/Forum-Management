<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Management</title>

  
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
     <script src="js/jquery-2.2.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/validation.js"></script>
    
        <script>

            $(".parentContainer").css("min-height", $(window).height()-50);
        </script>
       
 
</head>
<?php 
include ("Login.php");
include 'forgotPassword.php';
?>
  <body>
      
      
      
      <div class="nav navbar-default">

            <div class="container">

                <div class="navbar-header">

                    <a href="" class="navbar-brand"><h4>Form Management</h4></a>

                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">

                        <span class="sr-only">Toggle navigation</span>

                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>


                    </button>

                </div>

                <div class="collapse navbar-collapse">
                                   
                    <form class="navbar-form navbar-right" method="post">
                        <div class="form-group">
                            <input type="email" name="UserEmail" class="form-control" placeholder="EmailId" />
                        
                            <input type="password" name="UserPassword" class="form-control" placeholder="password" />
                           
                      
                      
                        <input type="submit" class="btn btn-success " name="Login" value="Login">
                        <br/><a href="#" class="read" data-toggle="modal" data-target="#myModal" >Forgot Password</a>
                         </div>
                    </form>
                 
                </div>
                
            </div>

        </div>
    <div class="container parentContainer">
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
            <h2>REGISTRATION FORM</h2>
            <div class="container childContainer col-md-10"> 
            <form class="form-group"  id="registration" method="post" enctype="multipart/form-data" >
              
                    <div class="col-md-6 col-offset-3 marginTop">
                        <label for="FirstName"> FirstName</label>
                        <input type="text" id="FirstName" name="FirstName" placeholder="Firstname" class="form-control " pattern="[a-zA-Z]+" required oninvalid="setCustomValidity('Plz enter on valid FirstName ')"  oninput="setCustomValidity('')" title="FirstName Should be Alpabets Only" />
                    </div>
                    <div class="col-md-6 col-offset-3 marginTop">
                        <label for="LastName">LastName</label>
                        <input type="text" id="LastName" name="LastName" placeholder="LastName" class="form-control" pattern="[a-zA-Z]+" required oninvalid="setCustomValidity('Plz enter on valid LastName ')"  oninput="setCustomValidity('')" title="LastName Should be Alpabets Only"/>

                    </div>
           



             
                    <div class="col-md-6 col-offset-3 marginTop">
                        <span class="form-group-addon">@</span>
                        <label for=EmailId>Email Id</label>
                        <input type="email" id="EmailId" name="EmailId" placeholder="emailId" class="form-control " required oninvalid="setCustomValidity('Plz enter on valid EmailID')" oninput="setCustomValidity('')" title="Email Should be in john@yahoo.com" />
                    </div>
                 <div class="col-md-6 col-offset-3 marginTop">
                        <span class="form-group-addon glyphicon glyphicon-phone "></span>
                        <label for="Mobile">Mobile-Num</label>
                        <input type="text" id="Mobile" name="Mobile" placeholder="Mobile number" maxlength="10" class="form-control" pattern="[0-9]{10}" required oninvalid="setCustomValidity('Plz enter on valid MobileNumber')" oninput="setCustomValidity('')" title="Mobile number should be 10 digit number" />
                   

                    </div>
                      <div class="col-md-6 col-offset-3 marginTop">
                       
                          <label for="Password">Password</label>
                          <input type="password" id="Password" name="Password" placeholder="password" class="form-control"  required oninvalid="setCustomValidity('Plz enter on  Password ')"  oninput="setCustomValidity('')" onblur="ValidatePassword()" />
                       
                          <span id="Password_error"></span>
                   

                    </div>
                 <div class="col-md-6 col-offset-3 marginTop">
                       
                     <label for="ConfirmPassword">Confirm Password</label>
                     <input type="password" id="ConfirmPassword" name="ConfirmPassword" placeholder="confirmPassword" class="form-control"  required oninvalid="setCustomValidity('Plz enter on Confirm Password ')"  oninput="setCustomValidity('')" onblur="ValidateConfirmPassword()" />
                     <span id="ConfirmPassword_error"></span>
                   

                    </div>
                
                   
                <div class="col-md-12 col-offset-3">
                <h3 class="marginTop">Terms & conditions::</h3>
                <div class="checkbox  marginTop">
                    <label><input type="checkbox"  name="tc" id="term1" value="accept"  required="">I hereby declare that the above written particulars are true </label>

                            </div>
                <input type="submit" class="btn btn-success btn-lg" value="SignUp" name="SignUp" id="SignUp"/></div>
                
            </form></div>

        </div>
          
      <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">X</button>
                                        <h4 class="modal-title">Forgot Password</h4>
                                    </div>
                                    <div class="modal-body">
                                       <form method="post" >
                                         
                                        <div class="form-group">
                                            <label for="ForgotEmail">Email ID</label>
                                            <input type="email" name="ForgotEmail" id="ForgotEmail"/>
                                            <input type="submit" name="ForgotSubmit" id="ForgotSubmit" />
                                        </div></form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                 

    
  </body>
 
</html>

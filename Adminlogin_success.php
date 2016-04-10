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
       
 <?php
 include 'connection.php';
 include 'login.php';
    
       
          $AdminQuery="SELECT AdminName FROM Admin WHERE id='".$_SESSION['id']."' LIMIT 1";
           $result=mysqli_query($link,$AdminQuery);
           $row=mysqli_fetch_array($result);
          $AdminName=$row['AdminName'];
         
 
 ?>
</head>
<body>
    <div class="container">
        
    <div class="col-md-6 marginTop parentContainer center ">
        <h2>Welcome 
            <?php
        if(isset($AdminName))
        {
            echo $AdminName;
        }
        
        ?></h2>
            <p><a href="AdminLogin.php">Click here to view ur DashBord</a></p> 
    </div>
      
    </div>
   
</body>
</html>
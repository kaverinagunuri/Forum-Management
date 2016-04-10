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
 
 session_start();
    
       
          $AdminQuery="SELECT AdminName FROM Admin WHERE id='".$_SESSION['id']."' LIMIT 1";
           $result=mysqli_query($link,$AdminQuery);
           $row=mysqli_fetch_array($result);
          $AdminName=$row['AdminName'];
          if(isset($_POST['View']))
          {
              //print_r($_SESSION['EmailId']);
           //header("Location:View.php");
          }
           if(isset($_POST['Update']))
           header("Location:Update.php");
            if(isset($_POST['Delete']))
           header("Location:Delete.php");
         
 
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
            <div class="container childContainer">
                  <form class="form-group"  id="UserProfile" method="post" enctype="multipart/form-data" >
                
    <?php
    

$sql = "SELECT Id,FirstName,LastName,EmailId FROM UserData";
$result = mysqli_query($link, $sql);

   if (mysqli_num_rows($result) > 0) {
    // output data of each row
   
       
       ?>
                <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>EmailId</th>
       
      </tr>
    </thead>
    <tbody>
        <?php
  
        while($row = mysqli_fetch_assoc($result)) {
        
        echo "<tr><td>".$row["Id"]."</td>"
                . "<td>".$row["FirstName"]."</td>"
                . "<td> ".$row["LastName"]."</td>"
                . "<td>".$row["EmailId"]."</td>"
                ."<td>"?><input type="submit" class="btn btn-success btn-sm" value="View" name="View" id="View"/>
                   <?php 
                  
                   "</td>"
                   ."<td>"?><input type="submit" class="btn btn-success btn-sm" value="Update" name="Update" id="Update"/>
                   <?php
                   "</td>"
                   ."<td>"?><input type="submit" class="btn btn-success btn-sm" value="Delete" name="Delete" id="Delete"/>
                   <?php
                   "</td>"
                . "</tr>";
       
            
        }
                  
   }
    
 
   
    ?>
    </tbody>
  </table>


                  </form>   
                
            </div>
            
        </div>
        

  <script src="js/bootstrap.min.js"></script>
        <script>

            $(".UserContainer").css("min-height", $(window).height()-100);
        </script>
  </body>
</html>
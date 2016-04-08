 <?php
 
        error_reporting(0);
        session_start();
        if($_GET['logout']==1 AND $_SESSION['id'])
        {
            session_destroy();
        $msg="you have been successfully logged out!";
            
        }
       include("connection.php");
       if(isset($_POST['SignUp'])=="SignUp"){
            $error="";
           // $mob="/^[1-9][0-9]*$/"; 
            if(!$_POST['FirstName'])
            { 
                $error.="please enter the FirstName<br/>";  
                } 
                 if(!$_POST['LastName'])
            { 
                $error.="please enter the LastName<br/>";  
                } 
            if(!$_POST['EmailId']) 
               $error.="please enter the email id <br/>";
            else if (!(filter_var($_POST['EmailId'],FILTER_VALIDATE_EMAIL)))
                    $error.="please enter valid email id <br/>";
                     if(!$_POST['Password'])
                 $error.="please enter the Password <br/>";
            
              if(!$_POST['ConfirmPassword'])
                 $error.="please enter the ConfirmPassword <br/>";
              else if ($_POST['Password'] != $_POST['ConfirmPassword'])
                 $error.="please enter the ConfirmPassword same as Password <br/>"; 
              
           else if(!$_POST['Mobile'])
                 $error.="please enter the Mobile <br/>";
           //else if(!preg_match('`/[^0-9]/`',$_POST['Mobile'])){
           //$error.="please enter Valid Mobile number <br/>";}
            
            else{
                if(strlen($_POST['Password'])<8)
                         $error.="the length of pssword must be atleast 8 characters<br/>";
                if(!preg_match('`[A-Z]`',$_POST['Password']))
                        $error.="password should contain atleast one Captial Letter <br/>";
            }
            if($error)
                $error="there were errors in your signup details<br/>".$error;
            else{
                // $password_md=md5(md5($_POST['email'].$_POST['password']));
              
               $query="SELECT * FROM users WHERE email='".mysqli_real_escape_string($link,$_POST['EmailId'])."'";
               $result=mysqli_query($link,$query);
           $results=mysqli_num_rows($result);
           if($results)
                $error="The email address is already registered .if U want to login IN?";
           else
           {
               $query="INSERT INTO UserData (FirstName,LastName,EmailId,Mobile,Password) VALUES('".($_POST['FirstName'])."','".($_POST['LastName'])."','".mysqli_real_escape_string($link,$_POST['EmailId'])."','".($_POST['Mobile'])."', '".($_POST['Password'])."')";
               
               
               mysqli_query($link,$query);
                $msg.="you were successfully signed!";
                // $_SESSION['id']=mysqli_insert_id($link);
       //echo $_SESSION['id'];
                  //header("Location:mainpage.php");
 
           }
           
            }
        }// '".mysqli_real_escape_string($link,$_POST['email'])."',md5(md5($_POST['email'].$_POST['password'])."'
        
        if(isset($_POST['Login']))
        { 
            if($_POST['Login']=="Login"){
            
        $x=mysqli_real_escape_string($link,$_POST['UserEmail']); 
        $y=($_POST['UserPassword']); 
        if(($x=="kaveri.nagunuri@karmanya.co.in") &&($y=="kaveri"))
        {
        header("Location:AdminLogin.php");}
        else{
           $Credential="SELECT * FROM UserData WHERE EmailId='$x' AND Password='$y'";
           //$query="SELECT * FROM users WHERE email='".mysqli_real_escape_string($link,$_POST['loginemail'])."' AND password='".md5(md5($_POST['loginemail'].$_POST['loginpassword']))."'"; 
            $result1=mysqli_query($link,$Credential);
            $row=mysqli_fetch_array($result1);
            //print_r($row);
            if($row){
                $_SESSION['id']=$row['Id'];
                print_r($_SESSION);
                header("Location:UserLogin.php");
            }
            else{
                $error="we could not find a user with the email and password.Sign Up!!";
            }
            }
        }
        }
        
        
        
        ?>
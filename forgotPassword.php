<?php
include 'connection.php';
if(isset($_POST['ForgotSubmit'])){
    $ForgotEmail=mysqli_real_escape_string($link,$_POST['ForgotEmail']); 
     $ForgotPassword="SELECT Password FROM UserData WHERE EmailId='".$ForgotEmail."' ";
            $result1=mysqli_query($link,$ForgotPassword);
            $row=mysqli_fetch_array($result1);
           echo $result1['Password'];
}
 ?>

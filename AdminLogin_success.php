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
        include 'Login.php';
        include 'AdminSql.php';
        ?>
    </head>
    <body>
        <div class="container">

            <div class="col-md-6 marginTop successContainer center ">
                <h2>Welcome 
<?php
if (isset($AdminName)) {
    echo $AdminName;
}
?></h2>
                <p class="lead center"><a href="AdminLoginJS.php">Click here to view ur DashBord</a></p> 
            </div>

        </div>

    </body>
    <script>

        $(".successContainer").css("min-height", $(window).height() - 100);
    </script>

</html>
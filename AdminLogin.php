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

                        <li class="active"><a href="AdminLoginJS.php"> DashBoard</a></li>

                        <li><a href="AdminUser.php">Users</a></li>

                        <li><a href="index.php?logout=1">Logout</a></li>

                    </ul>
                    <div class="navbar-form navbar-right">
                        <div class="sign">
                            <img src="images/sign.jpeg" />
<?php
echo $AdminName;
?>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <div class="container UserContainer">
            <div class="container childContainer">
                <form class="form-group"  id="UserProfile" method="post" enctype="multipart/form-data" >

<?php
$Query = "SELECT Id,FirstName,LastName,EmailId FROM UserData";
$Result = mysqli_query($link, $Query);

if (mysqli_num_rows($Result) > 0) {
    // output data of each row
    ?>
                        <div class="table-responsive">          
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
    while ($Row = mysqli_fetch_row($result)) {
        ?>

                                        <tr>
                                            <td><?php echo $Row[0] ?></td>
                                            <td><?php echo $Row[1] ?></td>
                                            <td><?php echo $Row[2] ?></td>
                                            <td><?php echo $row[3] ?></td>
                                            <td><a href="View.php?Id=<?= $row[0] ?>">View</a></td>
                                            <td><a href="Edit.php?Id=<?= $row[0] ?>">Edit</a></td>
                                            <td><a href="Delete.php?Id=<?= $row[0] ?>">Delete</a></td>
                                        </tr>

        <?php
    }
}
?>
                            </tbody>
                        </table>
                    </div>

                </form>   

            </div>

        </div>


        <script src="js/bootstrap.min.js"></script>
        <script>

            $(".UserContainer").css("min-height", $(window).height() - 100);
        </script>
    </body>
</html>
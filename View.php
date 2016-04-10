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

   
    $AdminQuery = "SELECT AdminName FROM Admin WHERE id='" . $_SESSION['id'] . "' LIMIT 1";
    $result = mysqli_query($link, $AdminQuery);
    $row = mysqli_fetch_array($result);
    $AdminName = $row['AdminName'];
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
            <div class="container childContainer">
                <form class="form-group"  id="UserProfile" method="post" enctype="multipart/form-data" >

                    <?php
                  $UserQuery="SELECT * FROM UserData WHERE Id='".$_GET['Id']."' LIMIT 1";
           $UserResult=mysqli_query($link,$UserQuery);
           ?>

                    <div class="table-responsive">          
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>FirstName</th>
                                    <th>LastName</th>
                                    <th>EmailId</th>
                                    <th>Mobile-Number</th>
                                    <th>Password</th>
                                    <th>AddressOne</th>
                                    <th>AddressTwo</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Zip-Code</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_row($UserResult)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row[0] ?></td>
                                        <td><?php echo $row[1] ?></td>
                                        <td><?php echo $row[2] ?></td>
                                        <td><?php echo $row[3] ?></td>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[5] ?></td>
                                        <td><?php echo $row[6] ?></td>
                                        <td><?php echo $row[7] ?></td>
                                        <td><?php echo $row[8] ?></td>
                                        <td><?php echo $row[9] ?></td>
                                        <td><?php echo $row[10] ?></td>
                                        <td><?php echo $row[11] ?></td>
                                    </tr>
                                    <?php
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
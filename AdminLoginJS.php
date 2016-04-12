<?php
include 'Login.php';
include 'AdminSql.php';
$sql = "SELECT Id,FirstName,LastName,EmailId FROM UserData";
$result = mysqli_query($link, $sql);
$Row = mysqli_fetch_all($result);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login-Success</title>


        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link src="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <script src="js/jquery-2.2.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/validation.js"></script>
        <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>

        <script>
            var Data =<?php echo json_encode($Row); ?>;

            $(document).ready(function () {


                $('#example').DataTable({
                    data: Data,
                    columns: [
                        {title: "Id"},
                        {title: "Firstname"},
                        {title: "Lastname"},
                        {title: "EmailId"}
                    ]

                });


                var table = $('#example').DataTable();

                $('#example tbody').on('click', 'tr', function () {
                    var data = table.row(this).data();

                    window.location.href = "View.php?Id=" + data[0];


                });
            });


        </script>


    </head>




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


                    <table id="example" class="display" width="100%">
                    </table>

                </form>   

            </div>

        </div>


        <script src="js/bootstrap.min.js"></script>
        <script>

            $(".UserContainer").css("min-height", $(window).height() - 100);

        </script>

    </body>
</html>
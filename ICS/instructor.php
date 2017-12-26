<?php
include('src/session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css" >
    <link rel="stylesheet" href="css/home-student.css" >
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" h>Web Project</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <button id="logout" type="button" class="btn btn-default pull-right" style="margin-top: 8px;margin-right: 20px"> <a href="src/logout.php" style="text-decoration:none">Logout</a></button>
        </ul>
    </div>
</nav>
        <!-- Page Content -->
        <div class="container">

            <!-- Jumbotron Header -->
            <header class="jumbotron my-4" >
                <h1 class="display-3">Welcome <?php echo $_SESSION['user'] ?></h1>
                <p class="lead">Welcome to ICS Management System</p>
            </header>

            <!-- Page Features -->
            <div class="row text-center">
                <div class="col-md-6 col-md-offset-3">
                    <h1>Preferred Courses</h1>
                    <div class="panel panel-login">

                        <div class="panel-heading">
                        </div>
                        <div class="message alert hide">
                            <strong>Success!</strong>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="request-form" name="request-form" action="" method="post" role="form" style="display: block;">

                                        <div class="form-group">
                                            <select class="form-control" name="course" id="course" tabindex="1" >
                                                <?php
                                                include('src/connection.php');
                                                $sql = "SELECT CourseCode FROM course";
                                                $result = mysqli_query($conn, $sql);

                                                $row = mysqli_fetch_all($result);
                                                $i = 0;
                                                foreach($row as $id){
                                                    echo "<option value=$id[0]>$id[0]</option>";

                                                }

                                                ?>
                                            </select>
                                        <div class="form-group" style="margin-top: 15px">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="button" name="request" id="request" class="form-control btn btn-success " value="Request Now">
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->


    <!-- /.container -->

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="js/instructor.js" type="text/javascript"></script>
</body>
</html>
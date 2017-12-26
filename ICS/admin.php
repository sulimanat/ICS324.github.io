<?php
session_start();// Starting Session
if(!isset($_SESSION['login_user']) && $_SESSION['type'] != "admin"){// Closing Connection
    header('Location: index.php'); // Redirecting To Home Page
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Optional theme -->
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" id="default">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css" >
    <link rel="stylesheet" href="css/admin-page.css" >
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
<div class="container">

    <div class="row">
        <div class="col-md-12" style="margin-left:30px">
            <h2>
                Chairman's Dashboard
            </h2>
        </div>
    </div>
    <div class="col-md-12">

        <div class="panel panel-default panel-fade">

            <div class="panel-heading">

                                <span class="panel-title">

                                    <div class="pull-left">

                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#1" data-toggle="tab"><i class="glyphicon glyphicon-home"></i> Course/Term</a></li>
                                        <li><a href="#2" data-toggle="tab"><i class="glyphicon glyphicon-map-marker"></i> Instructor/Term</a></li>
                                        <li><a href="#3" data-toggle="tab"><i class="glyphicon glyphicon-folder-open"></i> Course/Eligibility</a></li>
                                        <li><a href="#4" data-toggle="tab"><i class="glyphicon glyphicon-book"></i> Course/Instructor</a></li>
                                    </ul>

                                    </div>


                                    <div class="clearfix"></div>

                                </span>

            </div>

            <div class="panel-body">

                <div class="tab-content">

                    <div class="tab-pane fade in active" id="1">
                        <h3>Instructors who taught the course between the two terms</h3>

                        <div class="nav nav-justified navbar-nav">

                            <form class="navbar-form navbar-search" role="search">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <select class="form-control" name="course" id="course" tabindex="1" >
                                            <option value="">Select Course</option>
                                            <?php
                                            include('src/connection.php');
                                            $sql = "SELECT CourseCode FROM course";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while($data = mysqli_fetch_assoc($result)){
                                                    echo "<option value=" . $data["CourseCode"] .">" . $data["CourseCode"] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>


                                        <select class="form-control" name="term1" id="term1" tabindex="1" >
                                            <option value="">From</option>
                                            <?php
                                            include('src/connection.php');
                                            $sql = "SELECT DISTINCT Term FROM section";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while($data = mysqli_fetch_assoc($result)){
                                                    echo "<option value=" . $data["Term"] .">" . $data["Term"] . "</option>";
                                                }
                                            }
                                            ?>


                                        </select>

                                        <select class="form-control" name="term2" id="term2" tabindex="1" >
                                            <option value="">To</option>
                                            <?php
                                            include('src/connection.php');
                                            $sql = "SELECT DISTINCT Term FROM section ";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while($data = mysqli_fetch_assoc($result)){
                                                    echo "<option value=" . $data["Term"] .">" . $data["Term"] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="input-group-btn">
                                        <button type="button" id="search-1" class="btn btn-search btn-default">
                                            Search
                                        </button>


                                    </div>
                                </div>
                            </form>

                        </div>
                        <TABLE class="table table-striped">
                            <THEAD>
                            <TR>
                                <TH>Instructor ID</TH>
                                <TH style="text-align:left">Name</TH>

                            </TR>
                            </THEAD>
                            <TBODY id="body-1">
                            <TR>
                                <TD id="id"></TD>
                                <TD id="name"></TD>
                            </TR>
                            </TBODY>
                        </TABLE>
                        </div>


                    <div class="tab-pane fade" id="2">
                        <h3>Courses taught by the instructor between the two terms</h3>

                        <div class="nav nav-justified navbar-nav">

                            <form class="navbar-form navbar-search" role="search">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <select class="form-control" name="instructor" id="instructor" tabindex="1" >
                                            <option value="">Select Instructor</option>
                                            <?php
                                            include('src/connection.php');
                                            $sql = "SELECT InstructorID FROM Instructor";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while($data = mysqli_fetch_assoc($result)){
                                                    echo "<option value=" . $data["InstructorID"] .">" . $data["InstructorID"] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>


                                        <select class="form-control" name="term3" id="term3" tabindex="1" >
                                            <option value="">From</option>
                                            <?php
                                            include('src/connection.php');
                                            $sql = "SELECT DISTINCT Term FROM section ";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while($data = mysqli_fetch_assoc($result)){
                                                    echo "<option value=" . $data["Term"] .">" . $data["Term"] . "</option>";
                                                }
                                            }
                                            ?>


                                        </select>

                                        <select class="form-control" name="term4" id="term4" tabindex="1" >
                                            <option value="">To</option>
                                            <?php
                                            include('src/connection.php');
                                            $sql = "SELECT DISTINCT Term FROM section ";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while($data = mysqli_fetch_assoc($result)){
                                                    echo "<option value=" . $data["Term"] .">" . $data["Term"] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="input-group-btn">
                                        <button type="button" id="search-2" class="btn btn-search btn-default">
                                            Search
                                        </button>


                                    </div>
                                </div>
                            </form>

                        </div>
                        <TABLE class="table table-striped">
                            <THEAD>
                            <TR>
                                <TH>Course Code</TH>
                                <TH style="text-align:left">Name</TH>

                            </TR>
                            </THEAD>
                            <TBODY id="body-2">
                            <TR>
                                <TD id="id2"></TD>
                                <TD id="name2"></TD>
                            </TR>
                            </TBODY>
                        </TABLE>
                    </div>

                    <div class="tab-pane fade" id="3">
                        <h3>Students who are eligible to take the course next semester</h3>

                        <div class="nav nav-justified navbar-nav">

                            <form class="navbar-form navbar-search" role="search">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <select class="form-control" name="course2" id="course2" tabindex="1" >
                                            <option value="">Select Course</option>
                                            <?php
                                            include('src/connection.php');
                                            $sql = "SELECT CourseCode FROM course";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while($data = mysqli_fetch_assoc($result)){
                                                    echo "<option value=" . $data["CourseCode"] .">" . $data["CourseCode"] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>

                                    </div>

                                    <div class="input-group-btn">
                                        <button type="button" id="search-3" class="btn btn-search btn-default">
                                            Search
                                        </button>

                                    </div>
                                </div>
                            </form>

                        </div>
                        <TABLE class="table table-striped">
                            <THEAD>
                            <TR>
                                <TH>Student ID</TH>
                                <TH style="text-align:left">Name</TH>

                            </TR>
                            </THEAD>
                            <TBODY id="body-3">
                            <TR>
                                <TD id="id3"></TD>
                                <TD id="name3"></TD>
                            </TR>
                            </TBODY>
                        </TABLE>
                    </div>
                    <div class="tab-pane fade" id="4">
                    <h3>Instructors who can teach the course</h3>

                    <div class="nav nav-justified navbar-nav">

                        <form class="navbar-form navbar-search" role="search">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <select class="form-control" name="course3" id="course3" tabindex="1" >
                                        <option value="">Select Course</option>
                                        <?php
                                        include('src/connection.php');
                                        $sql = "SELECT CourseCode FROM course";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while($data = mysqli_fetch_assoc($result)){
                                                echo "<option value=" . $data["CourseCode"] .">" . $data["CourseCode"] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>

                                <div class="input-group-btn">
                                    <button type="button" id="search-4" class="btn btn-search btn-default">
                                        Search
                                    </button>

                                </div>
                            </div>
                        </form>

                    </div>
                    <TABLE class="table table-striped">
                        <THEAD>
                        <TR>
                            <TH>Instructor ID</TH>
                            <TH style="text-align:left">Name</TH>

                        </TR>
                        </THEAD>
                        <TBODY id="body-4">
                        <TR>
                            <TD id="id4"></TD>
                            <TD id="name4"></TD>
                        </TR>
                        </TBODY>
                    </TABLE>
                </div>



                    </div>

                </div>

            </div>

        </div>
    </div>

<script src="https://code.jquery.com/jquery-1.9.1.js" type="text/javascript" ></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.easytabs/3.2.0/jquery.easytabs.min.js" type="text/javascript"></script>
<script src="js/admin.js" type="text/javascript"></script>
</body>
</html>
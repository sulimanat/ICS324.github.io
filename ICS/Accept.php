<?php
session_start();// Starting Session
include('src/chairman-load.php');
if(!isset($_SESSION['login_user'])){// Closing Connection
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


                    <div class="panel-body">

                        <div class="tab-content">

                            <div class="tab-pane fade in active" id="hostel">
                                <h3>Requests From Instructors</h3>
                                <FORM  name= "accept-form" ACTION="" METHOD="post">
                                    <INPUT TYPE="hidden" NAME="FormName" VALUE="PrintLetters">
                                    <TABLE class="table table-striped">
                                        <THEAD>
                                        <TR>
                                            <TH>Course Code</TH>
                                            <TH style="text-align:left">Instructor ID</TH>
                                            <th>Accept</th>
                                            <th>Reject</th>

                                        </TR>
                                        </THEAD>
                                        <TBODY>
                                        <?php

                                        include('src/connection.php');

                                        $sql = "SELECT  * FROM preferences WHERE Status = 'Pending'";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while($data = mysqli_fetch_assoc($result)){
                                                echo "<TR>" .
                                                    "<TD><input type='text' name='course-".$data['CourseCode'].$data['InstructorID']."' value='".$data['CourseCode']."'></TD>".
                                                    "<TD><input type='text' name='id-".$data['CourseCode'].$data['InstructorID']."' value='".$data['InstructorID']."'></TD>".
                                                    "<td><p data-placement='top' data-toggle='tooltip' title='Accept'><button type='submit' value='".$data['CourseCode'].$data['InstructorID']."' id='accept' name='accept-button' class='btn btn-primary btn-xs' data-title='Accept' data-toggle='modal'  ><span class='glyphicon glyphicon-pencil'></span></button></p></td>".
                                                    "<td><p data-placement='top' data-toggle='tooltip' title='Reject'><button class='btn btn-danger btn-xs'  value='".$data['CourseCode'].$data['InstructorID']."' id='reject' name='reject-button' data-title='Reject' data-toggle='modal'  ><span class='glyphicon glyphicon-trash'></span></button></p></td>".
                                                    "</TR>";
                                            }
                                        }
                                        ?>

                                        </TBODY>
                                    </TABLE>
                                </FORM>
                            </div>



                        </div>

                    </div>

                </div>

            </div>
        </div>
<script src="https://code.jquery.com/jquery-1.9.1.js" type="text/javascript" ></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.easytabs/3.2.0/jquery.easytabs.min.js" type="text/javascript"></script>
<script src="js/accept.js" type="text/javascript"></script>
</body>
</html>
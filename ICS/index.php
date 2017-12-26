<?php
include('src/login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
    $type = $_SESSION['type'];
    if($type == "instructor"){
        header("location: instructor.php"); // Redirecting To Other Page
    }else if($type == "chairman"){
        header("location: accept.php"); // Redirecting To Other Page
    }else if($type == "admin"){
        header("location: admin.php"); // Redirecting To Other Page
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="css/login.css" >
        <link rel="stylesheet" href="css/index.css" >
        
    </head>
    <body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" h>Web Project</a>
            </div>
        </div>
    </nav>

                <div class="container">
                   <div class="row">
                       <section id="login">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-wrap">
                                    <h1>Log In</h1>
                                        <form role="form" action="" method="post" id="login-form" autocomplete="off">
                                            <div class="form-group">
                                                <label for="email" class="sr-only">Email</label>
                                                <input type="text" name="userId" id="userId" class="form-control" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="sr-only">Password</label>
                                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="checkbox">
                                                <span class="character-checkbox" onclick="showPassword()"></span>
                                                <span class="label">Show password</span>
                                            </div>
                                            <input name="submit" type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
                                        </form>
                                        <!--<a href="registration.php" class="forget">Not a member? Register</a>-->
                                        <hr>
                                    </div>
                                </div> <!-- /.col-xs-12 -->
                            </div> <!-- /.row -->
                        </div> <!-- /.container -->
                    </section>
                    
                   
       
                   </div>
                </div>
            <!-- /#wrapper -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> 
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="js/index.js" type="text/javascript"></script>
    </body>
</html>
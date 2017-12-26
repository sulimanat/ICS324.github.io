<?php


session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['userId']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
        echo $error;
    }
    else
    {
        include('src/connection.php');
        // Define $username and $password
        $userId=$_POST['userId'];
        $password=$_POST['password'];
        // Establishing Connection with Server by passing server_name, user_id and password as a parameter
        
        
        $sql = "SELECT * FROM login where password='$password' AND userID='$userId'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            echo '<div id="message" class="message alert alert-success text-center"><strong>Login Successful</strong></div>';
            $type = $result->fetch_assoc()['type'];
            $_SESSION['login_user']=$userId; // Initializing Session
            $_SESSION['type']=$type; // Initializing Session
            echo $type;
            if($type == "instructor"){
                header("location: instructor.php"); // Redirecting To Other Page
            }else if($type == "chairman"){
                header("location: accept.php"); // Redirecting To Other Page
            }else if($type == "admin"){
                header("location: admin.php"); // Redirecting To Other Page
            }


        } else {
            echo '<div id="message" class="message alert text-center alert-danger"><strong>Invalid Login Details</strong></div>';
        }   
    }
}
?>
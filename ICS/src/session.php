<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root", "", "ics");
// Selecting Database
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
$type=$_SESSION['type'];
// SQL Query To Fetch Complete Information Of User
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "select * from instructor where InstructorID=$user_check";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$_SESSION['user'] = $row['FirstName'];

if(!isset($_SESSION['login_user'])){
header('Location: index.php'); // Redirecting To Home Page
}
?>
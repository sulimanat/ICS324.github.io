<?php

include('connection.php');
session_start();

$course = $_REQUEST["course"];
$userId = $_SESSION['login_user'];

if(!empty($course))
{ 
    $sql = "SELECT * FROM preferences WHERE InstructorID = $userId AND CourseCode = '$course'";
    $result = mysqli_query($conn, $sql);
    //print_r(mysqli_num_rows($result));
    if (mysqli_num_rows($result) == 0) {
        $query = "INSERT INTO preferences (CourseCode,InstructorID,Status) VALUES ('$course',$userId,'Pending')";
        $data = mysqli_query($conn, $query);
        //print_r("Data:".$data);
        if($data) { 
            echo json_encode("success"); 
        }
        
        } else {

    echo json_encode("already");
    }
} 

?>
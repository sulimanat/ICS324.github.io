<?php

include('connection.php');

$course = $_REQUEST["course"];
$from = $_REQUEST["from"];
$to = $_REQUEST["to"];

if(empty($course)){
    echo json_encode("error");
}

if(!empty($course))
{ 
    $sql = "SELECT i.InstructorID,i.FirstName,i.Lname FROM Section AS s JOIN Instructor AS i ON s.InstructorID = i.InstructorID WHERE Term >= $from AND Term <= $to AND CourseCode='$course'";
    $result = mysqli_query($conn, $sql);
    //print_r($sql);
    if (mysqli_num_rows($result) > 0) {   
        $data = mysqli_fetch_all($result);
        echo json_encode($data); 
    } else { 
    echo json_encode("error");
    }
} 

?>
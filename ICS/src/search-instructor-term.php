<?php

include('connection.php');

$instructor = $_REQUEST["instructor"];
$from = $_REQUEST["from"];
$to = $_REQUEST["to"];

if(empty($instructor)){
    echo json_encode("error");
}

if(!empty($instructor))
{
    $sql = "SELECT i.CourseCode,i.CourseName FROM Section AS s JOIN Course AS i ON s.CourseCode = i.CourseCode WHERE Term >= $from AND Term <= $to AND InstructorID=$instructor";
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
<?php

include('src/connection.php');

if (isset($_POST['accept-button'])) {
    $id =  $_POST['accept-button'];
    $course = $_POST['course-'.$id];
    $instructorId = $_POST['id-'.$id];



    $sql = "UPDATE preferences SET Status='Approved' WHERE InstructorID = $instructorId AND CourseCode = '$course'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo '<div id="message" class="message alert alert-success text-center"><strong>Approved Successfully</strong></div>';
    }else{
       echo '<div id="message" class="message alert alert-danger"><strong>Error</strong></div>';
    }
}

if (isset($_POST['reject-button'])) {
    $id =  $_POST['reject-button'];
    $course = $_POST['course-'.$id];
    $instructorId = $_POST['id-'.$id];

    $sql = "UPDATE preferences SET Status='Rejected' WHERE InstructorID = $instructorId AND CourseCode = '$course'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo '<div id="message" class="message alert alert-success text-center"><strong>Rejected Successfully</strong></div>';
    }else{
        echo '<div id="message" class="message alert alert-danger"><strong>Error</strong></div>';
    }
}


?>
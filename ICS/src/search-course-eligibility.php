<?php

include('connection.php');

$course = $_REQUEST["course"];
if(empty($course)){
    echo json_encode("error");
}

if(!empty($course))
{
    $sql = "SELECT StuID from enrollment where crn = (SELECT CRN from section as sec join prerequisite as pre 
            on sec.CourseCode = pre.PreCourseCode and pre.CourseCode = 'ISE305')";
    $result = mysqli_query($conn, $sql);
    //print_r($sql);
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        foreach ($data as $id){
            $sql2 = "SELECT StuID,Fname,Lname from student where StuID = $id";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) {
                $data2 = mysqli_fetch_all($result2);
            }

        }
        echo json_encode($data2);
    } else {
        echo json_encode("error");
    }
}

?>
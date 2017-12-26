<?php
$conn = mysqli_connect("172.16.0.129", "ICS324", "ICS324", "xe","1521");
        // Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
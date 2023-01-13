<?php
$roletablename = 'roletable';
$sql = "CREATE TABLE  $roletablename(type BOOLEAN, name VARCHAR(20), mobno BIGINT, cname VARCHAR(20), dname VARCHAR(20), email VARCHAR(20) NOT NULL primary key, city VARCHAR(20), password VARCHAR(20) NOT NULL)";
if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Table Created Sucessfully")</script>';
} else {
    echo null;
    // echo "<br>Error on Table Creation" . mysqli_error($conn);
}
?>
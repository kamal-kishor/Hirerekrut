<?php
$tablename = 'hierrekruttable';
$sql = "CREATE TABLE  $tablename(name VARCHAR(20), email VARCHAR(20) NOT NULL primary key, subject VARCHAR(20), msg VARCHAR(500))";
if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Table Created Sucessfully")</script>';
} else {
    echo null;
    // echo "<br>Error on Table Creation" . mysqli_error($conn);
    // echo 'Table-Exist';
}
?>
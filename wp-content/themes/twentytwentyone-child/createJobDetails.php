<?php
$tablename = 'jobdetails';
$sql = "CREATE TABLE  $tablename(id INT(11) AUTO_INCREMENT PRIMARY KEY, profilename VARCHAR(20), location VARCHAR(20), package VARCHAR(20), experience VARCHAR(20), skills VARCHAR(20), qualification VARCHAR(20), date TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Table Created Sucessfully")</script>';
} else {
    echo null;
}

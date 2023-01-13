<?php
include 'contactDB.php';
include 'createTable.php';
// header('Content-Type: application/json');
$sql = "SELECT * FROM $tablename";
$result = mysqli_query($conn, $sql) or die("sql failed");
$output = mysqli_fetch_all($result, MYSQLI_ASSOC);
$json_data = json_encode($output);
$file_name = "My-" . date("d-m-Y") . ".json";
if (file_put_contents("first.json", $json_data)) {
    echo "file created";
} else {
    echo "file not created";
}

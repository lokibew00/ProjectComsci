<?php
ini_set('display_errors', 1);
error_reporting(~0);

$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "android_api";

$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
$sql = "SELECT * FROM machines";
$query = mysqli_query($conn,$sql);
if (!$query) {
    printf("Error: %s\n", $conn->error);
    exit();
}
$resultArray = array();
while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
{
    array_push($resultArray,$result);
}
mysqli_close($conn);

echo json_encode($resultArray);
?>
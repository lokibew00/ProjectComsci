<?php

include '../db/database.php';

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];


function getHash($password) {

    $salt = sha1(rand());
    $salt = substr($salt, 0, 10);
    $encrypted = password_hash($password.$salt, PASSWORD_DEFAULT);
    $hash = array("salt" => $salt, "encrypted" => $encrypted);

    return $hash;

}
$uuid = uniqid('', true);
$hash = getHash($password);
$encrypted_password = $hash["encrypted"]; // encrypted password
$salt = $hash["salt"]; // salt
$time = date("Y-m-d H:i:s");

$sql = "INSERT INTO `users` (unique_id,`name`, `username`, `encrypted_password`,salt , created_at) "
    . "VALUES ('$uuid','$name', '$username', '$encrypted_password' ,'$salt' , '$time')";

$result = mysqli_query($link, $sql);

if ($result) {
    header('Content-Type: application/json');
    echo json_encode(array('status' => 'success', 'message' => 'บันทึกข้อมูลเรียบร้อยแล้ว'));
} else {
    header('Content-Type: application/json');
    $errors = "เกิดข้อผิดพลาดในการบันทึก กรุณาลองใหม่ " . mysqli_error($link);
    echo json_encode(array('status' => 'danger', 'message' => $errors));
}
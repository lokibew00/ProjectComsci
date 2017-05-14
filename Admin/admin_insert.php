<?php

    include '../db/database.php';
    
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];
    $admin_fullname = $_POST['admin_fullname'];
    
    //เข้ารหัส Password
    //$salt = 'tikde78uj4ujuhlaoikiksakeidke';
	$salt = 'tyidi3idkdislsoskdisli333lidk';
    $hash_userPassword = hash_hmac('sha256', $admin_password, $salt);
    
    //อัพโหลดรูปประจำตัว 
    if (is_uploaded_file($_FILES['admin_picture']['tmp_name'])) {
        $new_image_name = 'news_'.uniqid().".".pathinfo(basename($_FILES['admin_picture']['name']), PATHINFO_EXTENSION);
        $image_upload_path = "./dist/img/".$new_image_name;
        move_uploaded_file($_FILES['admin_picture']['tmp_name'],$image_upload_path);
    } else {
        $new_image_name = "";
    }
    
    $sql = "INSERT INTO `admins` (`admin_username`, `admin_password`, `admin_fullname`, `admin_picture`) 
    VALUES ('$admin_username', '$hash_userPassword', '$admin_fullname', '$new_image_name')";
    
    $result = mysqli_query($link, $sql);
    
    if ($result) {
        header('Content-Type: application/json');
        echo json_encode(array('status' => 'success','message' => 'บันทึกข้อมูลเรียบร้อยแล้ว'));
    } else {
        header('Content-Type: application/json');
        $errors = "Username ซ้ำ กรุณาเปลี่ยน Username ใหม่" . mysqli_error($link);
        echo json_encode(array('status' => 'danger','message' => $errors));
    }
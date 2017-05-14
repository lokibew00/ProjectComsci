<?php

    include '../db/database.php';
    
    $admin_id = $_POST['admin_id'];
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];
    $admin_fullname = $_POST['admin_fullname'];
    
    
    //ถ้ากรอก password เข้ามาก็ให้ update
    if (!empty( $admin_pssword)) {
          //เข้ารหัส Password
        $salt = 'tyidi3idkdislsoskdisli333lidk';
        $hash_admin_password = hash_hmac('sha256', $admin_pssword, $salt);
         $sql = "UPDATE `admins` SET `admin_password`='$hash_admin_password' WHERE (`admin_id`='$admin_id')";
         mysqli_query($link, $sql);
    }
  
    
    //ถ้าอัพเดทอัพโหลดรูปประจำตัว
    if (is_uploaded_file($_FILES['admin_picture']['tmp_name'])) {
        //ลบรูปเดิมก่อน
        $sql_img = "SELECT admin_picture FROM admins WHERE admin_id='$admin_id'";
        $result_img = mysqli_query($link, $sql_img);
        $img_name = mysqli_fetch_row($result_img);
        @unlink('./dist/img/'.$img_name[0]);
        
        $new_image_name = 'news_'.uniqid().".".pathinfo(basename($_FILES['admin_picture']['name']), PATHINFO_EXTENSION);
        $image_upload_path = "./dist/img/".$new_image_name;
        move_uploaded_file($_FILES['admin_picture']['tmp_name'],$image_upload_path);
        
        $sql = "UPDATE `admins` SET `admin_picture`='$new_image_name' WHERE (`admin_id`='$admin_id')";
        mysqli_query($link, $sql);
    }
    
    $sql = "UPDATE `admins` SET `admin_username`='$admin_username', `admin_fullname`='$admin_fullname' WHERE (`admin_id`='$admin_id')";
    
    $result = mysqli_query($link, $sql);
    
    if ($result) {
        header('Content-Type: application/json');
        echo json_encode(array('status' => 'success','message' => 'บันทึกข้อมูลเรียบร้อยแล้ว'));
    } else {
        header('Content-Type: application/json');
        $errors = "Username ซ้ำ กรุณาเปลี่ยน Username ใหม่" . mysqli_error($link);
        echo json_encode(array('status' => 'danger','message' => $errors));
    }
     
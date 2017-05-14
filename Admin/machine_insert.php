<?php

    include '../db/database.php';
    
    $location_id = $_POST['location_id'];
    $machine_id = $_POST['machine_id'];
    $machine_namethai = $_POST['machine_namethai'];
    $machine_nameeng = $_POST['machine_nameeng'];

    
    
    //อัพโหลดรูปสินค้า

    if (is_uploaded_file($_FILES['machine_picture']['tmp_name'])) {
        $new_image_name = 'machine_'.uniqid().".".pathinfo(basename($_FILES['machine_picture']['name']), PATHINFO_EXTENSION);
        $image_upload_path = "dist/img/machine/".$new_image_name;
        move_uploaded_file($_FILES['machine_picture']['tmp_name'],$image_upload_path);
    } else {
        $new_image_name = "";
    }


    
    $sql = "INSERT INTO `machines` (`machine_id, `machine_name`, `machine_namethai`, `machine_nameeng`,`location_id`) VALUES ('$machine_id, '$machine_namethai', '$machine_nameeng', '$new_image_name', '$location_id')";
    
    $result = mysqli_query($link, $sql);
    
    if ($result) {
        header('Content-Type: application/json');
        echo json_encode(array('status' => 'success','message' => 'บันทึกข้อมูลเรียบร้อยแล้ว'));
    } else {
        header('Content-Type: application/json');
        $errors = "เกิดข้อผิดพลาด หรือ รหัส ซ้ำ กรุณาเปลี่ยนใหม่" . mysqli_error($link);
        echo json_encode(array('status' => 'danger','message' => $errors));
    }
<?php

    include '../db/database.php';
    
    $machine_namethai = $_POST['machine_namethai'];
    $machine_nameeng = $_POST['machine_nameeng'];
    
    
    $sql = "INSERT INTO `machines` (`machine_namethai`, `machine_nameeng`) VALUES ('$machine_namethai', '$machine_nameeng')";
    
    $result = mysqli_query($link, $sql);
    
    if ($result) {
        //header("Location: product_type.php");
        //echo "บันทึกเรียบร้อยแล้ว";
        header('Content-Type: application/json');
        echo json_encode(array('status' => 'success','message' => 'บันทึกข้อมูลเรียบร้อยแล้ว'));
    } else {
        header('Content-Type: application/json');
        $errors = "เกิดข้อผิดพลาดในการบันทึก กรุณาลองใหม่ " . mysqli_error($link);
        echo json_encode(array('status' => 'danger','message' => $errors));
        //echo "รหัสประเภทสินค้าซ้ำกัน";
        //echo mysqli_error($link);
    }
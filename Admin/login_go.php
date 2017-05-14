<?php
    include '../db/database.php';
    
    $admin_username = mysqli_real_escape_string($link,$_POST['admin_username']);
    $admin_password = mysqli_real_escape_string($link,$_POST['admin_password']);


    $salt = 'tyidi3idkdislsoskdisli333lidk';
    $hash_login_password = hash_hmac('sha256', $admin_password, $salt);
    
    $sql = "SELECT * FROM admins WHERE (admin_username=? AND admin_password=?)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $admin_username,$hash_login_password);
    mysqli_stmt_execute($stmt);
    $result_admin = mysqli_stmt_get_result($stmt);
    if($result_admin->num_rows == 1){
        session_start();
        $row_admin = mysqli_fetch_array($result_admin, MYSQLI_ASSOC);
        $_SESSION['admin_id'] = $row_admin['admin_id'];
        $_SESSION['admin_username'] = $row_admin['admin_username'];
        header('Content-Type: application/json');
        echo json_encode(array('status' => 'success'));
    } else {
        header('Content-Type: application/json');
        $errors = "Username หรือ Password ไม่ถูกต้อง" . mysqli_error($link);
        echo json_encode(array('status' => 'danger','message' => $errors));
    }
    
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($link);
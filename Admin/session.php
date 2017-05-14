<?php
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header("Location: login.php");
        }
        include '../db/database.php';
        
        $session_adminID = $_SESSION['admin_id'];
        
        $qry_admin = "SELECT * FROM admins WHERE admin_id='$session_adminID'";
        $result_admin = mysqli_query($link,$qry_admin);
        if ($result_admin) {
            $row_admin = mysqli_fetch_array($result_admin,MYSQLI_ASSOC);
            
            $s_admin_username = $row_admin['admin_username'];
            $s_admin_fullname = $row_admin['admin_fullname'];
            $s_admin_picture = $row_admin['admin_picture'];
            mysqli_free_result($result_admin);
        }
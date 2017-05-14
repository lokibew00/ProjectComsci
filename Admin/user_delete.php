<?php
        
        include '../db/database.php';
        
        $id = $_GET['id'];
        
        $sql = "DELETE FROM users WHERE user_id='$id' ";
        
        $result = mysqli_query($link, $sql);
        
        if ($result) {
            header("Location: user_list.php");
        }
        


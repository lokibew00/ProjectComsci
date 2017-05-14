<?php
        
        include '../db/database.php';
        
        $id = $_GET['id'];
        
        $sql = "DELETE FROM machines WHERE machine_id='$id' ";
        
        $result = mysqli_query($link, $sql);
        
        if ($result) {
            header("Location: machine_name.php");
        }
        


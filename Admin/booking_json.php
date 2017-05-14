<?php
       include '../db/database.php';

       $sql = "SELECT * FROM events LEFT JOIN machines ON events.machine_id=machines.machine_id 
LEFT JOIN users ON events.user_id=users.user_id";
       $result = mysqli_query($link, $sql);
       
        $bookingArray = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $bookingArray[] = $row;
        }
        
        echo json_encode($bookingArray);

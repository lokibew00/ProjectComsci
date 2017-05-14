<?php
       include '../db/database.php';
    
       $sql = "SELECT * FROM machines LEFT JOIN locations ON machines.location_id = locations.location_id";
       $result = mysqli_query($link, $sql);
       
        $machineArray = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $machineArray[] = $row;
        }
        
        echo json_encode($machineArray);

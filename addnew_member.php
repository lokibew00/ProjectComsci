<?php
$db = mysqli_connect("localhost" , "root" , "" , "android_api");
//
//if ($result = mysqli_query($db, "SELECT * from users")) {
//
//    /* determine number of rows result set */
//    $row_cnt = mysqli_num_rows($result);
//
//    printf("Result set has %d rows.\n", $row_cnt);
//
//    /* close result set */
//    mysqli_free_result($result);
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>1</title>
</head>
<body>
<form method="post">
    <table align=>
        <tr>
            <th>Add User</th>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" id="name" class="name"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" id="username" class="username"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password" id="password" class="password"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" id="submit" class="submit" value="เพิ่มผู้ใช้งาน"></td>
        </tr>
    </table>
</form>
<div align="center">
    <?php
    if ($_POST) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = mysqli_query($db, ("select * from users WHERE username=$username"));
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            echo "Duplicate User";
        }
        else {
            $sql = "INSERT INTO users (name, username, password) VALUE ('$name','$username','$password')";
            $query = mysqli_query($db, $sql);
            if ($query) {
                echo "Insert success";
            }
        }
    }
    ?>
</div>
</body>
</html>
<?php

class RegisterJson
{
    public $operation = "register";
    public $user = array();
}

?>
<form method="post" onclick="insert()">
        <table>
            <tr>
                <td>
                    Name
                <td>
                    <input type="text" name="name">
                </td>
                </td>
            </tr>
            <tr>
                <td>
                    Username
                <td><input type="text" name="username">
                </td>
                </td>
            </tr>
            <tr>
                <td>
                    Password
                <td><input type="password" name="password">
                </td>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit">
                </td>
            </tr>
            <?php

//            $decode = json_decode($myJSON);
//            echo $myJSON;
            ?>
        </table>
</form>

<?php
insert();
function insert(){
    $regis = new RegisterJson();
    $regis->operation;
    $regis->user = array("name" => $_POST["name"], "username" => $_POST["username"], "password" => $_POST["password"]);
    $myJSON = json_encode($regis);
    echo $myJSON;

}


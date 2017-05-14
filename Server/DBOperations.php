<?php

class DBOperations
{

    private $host = '127.0.0.1';
    private $user = 'root';
    private $db = 'android_api';
    private $pass = '';
    private $conn;

    public function __construct()
    {

        $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->pass);

    }


    public function insertData($name, $username, $password)
    {

        $unique_id = uniqid('', true);
        $hash = $this->getHash($password);
        $encrypted_password = $hash["encrypted"];
        $salt = $hash["salt"];

        $sql = 'INSERT INTO users SET unique_id =:unique_id,name =:name,
    username =:username,encrypted_password =:encrypted_password,salt =:salt,created_at = NOW()';
        $query = $this->conn->prepare($sql);
        $query->execute(array(':unique_id' => $unique_id, ':name' => $name, ':username' => $username,
            ':encrypted_password' => $encrypted_password, ':salt' => $salt));

        if ($query) {

            return true;

        } else {

            return false;

        }
    }

    public function insertEvent($machine_id, $user_id, $start_date, $end_date)
    {
        $time = date("Y-m-d H:i:s");
        try {
            $sql = "INSERT INTO `events`(`machine_id`, `user_id`, `start_date`, `end_date`, `created_date`) "
            . "VALUES ('$machine_id','$user_id','$start_date','$end_date','$time')";
            $query = $this->conn->prepare($sql);
            $query->execute(array(':machine_id' => $machine_id, ':user_id' => $user_id, ':start_date' => $start_date,
                ':end_date' => $end_date));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        if ($query) {

            return true;

        } else {

            return false;

        }
    }

    public function deleteEvent($machine_id, $user_id)
    {
        try {
            $sql = "DELETE FROM `events` WHERE machine_id = ':machine_id' , user_id = ':user_id' ";

            $query = $this->conn->prepare($sql);
            $query->execute(array(':machine_id' => $machine_id, ':user_id' => $user_id));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        if ($query) {

            return true;

        } else {

            return false;

        }
    }



    public function checkLogin($username, $password)
    {

        $sql = 'SELECT * FROM users WHERE username = :username';
        $query = $this->conn->prepare($sql);
        $query->execute(array(':username' => $username));
        $data = $query->fetchObject();
        $salt = $data->salt;
        $db_encrypted_password = $data->encrypted_password;

        if ($this->verifyHash($password . $salt, $db_encrypted_password)) {


            $user["name"] = $data->name;
            $user["username"] = $data->username;
            $user["unique_id"] = $data->unique_id;
            return $user;

        } else {

            return false;
        }

    }


    public function changePassword($username, $password)
    {


        $hash = $this->getHash($password);
        $encrypted_password = $hash["encrypted"];
        $salt = $hash["salt"];

        $sql = 'UPDATE users SET encrypted_password = :encrypted_password, salt = :salt WHERE username = :username';
        $query = $this->conn->prepare($sql);
        $query->execute(array(':username' => $username, ':encrypted_password' => $encrypted_password, ':salt' => $salt));

        if ($query) {

            return true;

        } else {

            return false;

        }

    }

    public function checkUserExist($username)
    {

        $sql = 'SELECT COUNT(*) from users WHERE username =:username';
        $query = $this->conn->prepare($sql);
        $query->execute(array('username' => $username));

        if ($query) {

            $row_count = $query->fetchColumn();

            if ($row_count == 0) {

                return false;

            } else {

                return true;

            }
        } else {

            return false;
        }
    }

//    public function checkEventExist($username)
//    {
//
//        $sql = 'SELECT COUNT(*) from users WHERE username =:username';
//        $query = $this->conn->prepare($sql);
//        $query->execute(array('username' => $username));
//
//        if ($query) {
//
//            $row_count = $query->fetchColumn();
//
//            if ($row_count == 0) {
//
//                return false;
//
//            } else {
//
//                return true;
//
//            }
//        } else {
//
//            return false;
//        }
//    }
//


    public function getHash($password)
    {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = password_hash($password . $salt, PASSWORD_DEFAULT);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);

        return $hash;

    }


    public function verifyHash($password, $hash)
    {

        return password_verify($password, $hash);
    }


}





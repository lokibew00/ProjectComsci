<?php

require_once 'DBOperations.php';

class Functions
{

    private $db;

    public function __construct()
    {

        $this->db = new DBOperations();

    }


    public function registerUser($name, $username, $password)
    {

        $db = $this->db;

        if (!empty($name) && !empty($username) && !empty($password)) {

            if ($db->checkUserExist($username)) {

                $response["result"] = "failure";
                $response["message"] = "User Already Registered !";
                return json_encode($response);

            } else {

                $result = $db->insertData($name, $username, $password);

                if ($result) {

                    $response["result"] = "success";
                    $response["message"] = "User Registered Successfully !";
                    return json_encode($response);

                } else {

                    $response["result"] = "failure";
                    $response["message"] = "Registration Failure";
                    return json_encode($response);

                }
            }
        } else {

            return $this->getMsgParamNotEmpty();

        }
    }
    public function addEvent($machine_id, $user_id, $start_date, $end_date)
    {

        $db = $this->db;

        if (!empty($machine_id) && !empty($user_id) && !empty($start_date) && !empty($end_date)) {

                $result = $db->insertEvent($machine_id , $user_id, $start_date, $end_date);

                if ($result) {

                    $response["result"] = "success";
                    $response["message"] = "Insert Event Successfully !";
                    return json_encode($response);

                } else {

                    $response["result"] = "failure";
                    $response["message"] = "Insert Event Failure";
                    return json_encode($response);

                }
        } else {

            return $this->getMsgParamNotEmpty();

        }
    }
    public function delEvent($machine_id, $user_id)
    {

        $db = $this->db;

        if (!empty($machine_id) && !empty($user_id)) {

            $result = $db->deleteEvent($machine_id , $user_id);

            if ($result) {

                $response["result"] = "success";
                $response["message"] = "Delete Event Successfully !";
                return json_encode($response);

            } else {

                $response["result"] = "failure";
                $response["message"] = "Delete Event Failure";
                return json_encode($response);

            }
        } else {

            return $this->getMsgParamNotEmpty();

        }
    }


    public function loginUser($username, $password)
    {

        $db = $this->db;

        if (!empty($username) && !empty($password)) {

            if ($db->checkUserExist($username)) {

                $result = $db->checkLogin($username, $password);


                if (!$result) {

                    $response["result"] = "failure";
                    $response["message"] = "Invaild Login Credentials";
                    return json_encode($response);

                } else {

                    $response["result"] = "success";
                    $response["message"] = "Login Successful";
                    $response["user"] = $result;
                    return json_encode($response);

                }

            } else {

                $response["result"] = "failure";
                $response["message"] = "Invaild Login Credentials";
                return json_encode($response);

            }
        } else {

            return $this->getMsgParamNotEmpty();
        }

    }


    public function changePassword($username, $old_password, $new_password)
    {

        $db = $this->db;

        if (!empty($username) && !empty($old_password) && !empty($new_password)) {

            if (!$db->checkLogin($username, $old_password)) {

                $response["result"] = "failure";
                $response["message"] = 'Invalid Old Password';
                return json_encode($response);

            } else {


                $result = $db->changePassword($username, $new_password);

                if ($result) {

                    $response["result"] = "success";
                    $response["message"] = "Password Changed Successfully";
                    return json_encode($response);

                } else {

                    $response["result"] = "failure";
                    $response["message"] = 'Error Updating Password';
                    return json_encode($response);

                }

            }
        } else {

            return $this->getMsgParamNotEmpty();
        }

    }

    public function isUsernameValid($username)
    {

        return $username;
    }

//    public function isEventValid($start_date){
//        return $start_date;
//
//    }
    public function getMsgParamNotEmpty()
    {


        $response["result"] = "failure";
        $response["message"] = "Parameters should not be empty !";
        return json_encode($response);

    }

    public function getMsgInvalidParam()
    {

        $response["result"] = "failure";
        $response["message"] = "Invalid Parameters";
        return json_encode($response);

    }

    public function getMsgInvalidUsername()
    {

        $response["result"] = "failure";
        $response["message"] = "Invalid Username";
        return json_encode($response);

    }

}

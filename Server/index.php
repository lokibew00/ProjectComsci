<?php

require_once 'Functions.php';

$fun = new Functions();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    if (isset($data->operation)) {

        $operation = $data->operation;

        if (!empty($operation)) {

            if ($operation == 'register') {

                if (isset($data->user) && !empty($data->user) && isset($data->user->name)
                    && isset($data->user->username) && isset($data->user->password)
                ) {

                    $user = $data->user;
                    $name = $user->name;
                    $username = $user->username;
                    $password = $user->password;

                    if ($fun->isUsernameValid($username)) {

                        echo $fun->registerUser($name, $username, $password);

                    } else {

                        echo $fun->getMsgInvalidUsername();
                    }

                } else {

                    echo $fun->getMsgInvalidParam();

                }
            } else if ($operation == 'booking') {

                if (isset($data->user) && !empty($data->user) && isset($data->user->machine_id)
                    && isset($data->user->user_id) && isset($data->user->start_date) && isset($data->user->end_date)
                ) {

                    $user = $data->user;
                    $machine_id = $user->machine_id;
                    $user_id = $user->user_id;
                    $start_date = $user->start_date;
                    $end_date = $user->end_date;

                    echo $fun->addEvent($machine_id, $user_id, $start_date, $end_date);


                } else {

                    echo $fun->getMsgInvalidParam();

                }
            } else if ($operation == 'del_booking') {

                if (isset($data->user) && !empty($data->user) && isset($data->user->machine_id)
                    && isset($data->user->user_id)
                ) {

                    $user = $data->user;
                    $machine_id = $user->machine_id;
                    $user_id = $user->user_id;

                    echo $fun->delEvent($machine_id, $user_id);


                } else {

                    echo $fun->getMsgInvalidParam();

                }


            } else if ($operation == 'login') {

                if (isset($data->user) && !empty($data->user) && isset($data->user->username) && isset($data->user->password)) {

                    $user = $data->user;
                    $username = $user->username;
                    $password = $user->password;

                    echo $fun->loginUser($username, $password);

                } else {

                    echo $fun->getMsgInvalidParam();

                }
            } else if ($operation == 'chgPass') {

                if (isset($data->user) && !empty($data->user) && isset($data->user->username) && isset($data->user->old_password)
                    && isset($data->user->new_password)
                ) {

                    $user = $data->user;
                    $username = $user->username;
                    $old_password = $user->old_password;
                    $new_password = $user->new_password;

                    echo $fun->changePassword($username, $old_password, $new_password);

                } else {

                    echo $fun->getMsgInvalidParam();

                }
            }

        } else {


            echo $fun->getMsgParamNotEmpty();

        }
    } else {

        echo $fun->getMsgInvalidParam();

    }
} else
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {


        echo "Learn2Crack Login API";

    }


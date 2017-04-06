<?php
    /**
     * Created by PhpStorm.
     * User: Andrew
     * Date: 2017/03/25
     * Time: 8:52 AM
     */

    require('classes/UserService.class.php');
    session_start();
//    session_destroy();

    // validate input from forms
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $param = json_decode($_GET["x"], false);

        if ($_SESSION && array_key_exists('username', $_SESSION))
            echo json_encode($_SESSION["username"]);
        else
            echo json_encode("Guest");

        if ($param == 'SIGNOUT') {
            if (session_status() > 1) {
                session_destroy();
                echo json_encode('TRUE');
            }
        }

    }

    //echo json_encode('jenny');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $req = file_get_contents("php://input");
        $data_req = json_decode($req, true);

        if ($data_req['REQ_TYPE'] == 'SIGNUP') {
            $username = test_input($data_req['uname']);
            $password = test_input($data_req['upwd']);
            $email = test_input($data_req['email']);
            $response = UserAccessService::signUp($username, $password, $email);
            echo json_encode($response);
        }

        if ($data_req['REQ_TYPE'] == 'SIGNIN') {
            $username = test_input($data_req['uname']);
            $password = test_input($data_req['upwd']);
            $response = UserAccessService::signIn($username, $password);
            if ($response != 'FAlSE') {
                $_SESSION['username'] = $username;
            }
            echo json_encode($response);
        }
    }
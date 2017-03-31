<?php
    /**
     * Created by PhpStorm.
     * User: Andrew
     * Date: 2017/03/25
     * Time: 8:52 AM
     */

    require('classes/UserService.classService.php');
    session_start();

    // **mock data
    /*$_SERVER['REQUEST_METHOD'] = 'POST';
    /*$_POST['REQUEST_TYPE'] = 'SIGNUP';
    $_POST['uname'] = 'Jesus';
    $_POST['upwd'] = 'js';
    $_POST['email'] = 'Jesus@heaven.com';

    $_POST['REQUEST_TYPE'] = 'SIGNOUT';
    $_POST['uname'] = 'Jesus';
    $_POST['upwd'] = 'js';*/

    // validate input from forms
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['REQUEST_TYPE'] == 'SIGNUP') {
            $username = test_input($_POST['uname']);
            $password = test_input($_POST['upwd']);
            $email = test_input($_POST['email']);
            $response = UserAccessService::signUp($username, $password, $email);
            echo $response;
        }

        if ($_POST['REQUEST_TYPE'] == 'SIGNIN') {
            $username = test_input($_POST['uname']);
            $password = test_input($_POST['upwd']);
            $response = UserAccessService::signIn($username, $password);
            echo $response;
        }

        if ($_POST['REQUEST_TYPE'] == 'SIGNOUT') {
            if (session_status() > 1) {
                session_destroy();
                echo 'TRUE';
            }
        }
    }
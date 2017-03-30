<?php
    /**
     * Created by PhpStorm.
     * User: Andrew
     * Date: 2017/03/25
     * Time: 8:52 AM
     */

    require('classes/UserService.classService.php');
    session_start();

    $_SERVER['REQUEST_METHOD'] = 'POST';
    $_POST['uname'] = 'Jesus';
    $_POST['upwd'] = 'js';
    $_POST['email'] = 'Jesus@heaven.com';
    //$_POST['']

    // validate input from forms
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = test_input($_POST['uname']);
        $password = test_input($_POST['upwd']);
        $email = test_input($_POST['email']);
        $response = UserAccessService::signUp($username, $password, $email);
        echo $response;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = test_input($_GET['uname']);
        $password = test_input($_GET['upwd']);
        $response = UserAccessService::signIn($username, $password);
        echo $response;
    }
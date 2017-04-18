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

    function strToImage($string) {
        $imageString = base64_decode($string);
        $image1 = imagecreatefromstring($imageString);
        imagepng($image1, "../resources/snap.png");
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

        if ($data_req['REQ_TYPE'] == 'IMG_BLEND') {
            strToImage($data_req["camSnapData"]);
            $image2 = imagecreatefrompng('../resources/splashes/splash0.png');
            $image1 = imagecreatefrompng('../resources/snap.png');
            if ($image1 !== false && $image2 !== false) {
                imagealphablending($image1,  true);
                imagesavealpha($image1, true);
                imagealphablending($image2,  true);
                imagesavealpha($image2, true);

                imagecopymerge($image1, $image2, 0, 0, 0, 0, 350, 350, 100);

                //header('Content-Type: image/png');
                //$dum = base64_encode($image1);
                imagepng($image1, "../resources/snapMerge.png");
                imagedestroy($image2);
                imagedestroy($image1);
                echo 'We... are... GOOOOOOD!!! :D';
            } else {
                echo 'NAH niga :(';
            }

           /* $image2 = imagecreatefrompng('../resources/splashes/splash0.png');

            imagealphablending($image1, false);
            imagesavealpha($image1, true);

            imagecopymerge($image1, $image2, 0, 0, 0, 0, 350, 350, 100);

            header('Content-Type: image/png');
            imagepng($image1, "../resources/image.png");
            //$dum = base64_encode($image1);
            imagedestroy($image2);
            imagedestroy($image1);

            echo 'We good';*/
        }
    }
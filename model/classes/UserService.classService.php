<?php
    /**
     * Created by PhpStorm.
     * User: Andrew
     * Date: 2017/03/25
     * Time: 10:07 AM
     */

    require('classes/Modal.class.php');

    class UserAccessService {
        // log user in
        public static function signIn($username, $password) {
            $modal = new Modal();
            $sql = $modal->generate_sql('get_user');
            $tmp = array($username);
            $data = $modal->get_db_data($sql, $tmp);
            if (count($data) > 0 && $password == $data[0]['password']) {
                return json_encode($data);
            } else {
                return json_encode('FALSE');
            }
        }

        // add a new user
        public static function signUp($username, $password,$email) {
            $data = array($username, $email, $password);
            $modal = new Modal();
            $sql = $modal->generate_sql('new_user');
            return ($modal->change_db_data($sql, $data));
        }

        // mail(to,subject,message,headers,parameters);
        // function: send verification mail
        public static function mailVerification($username, $emailAddress) {
            $msg = "Welcome to CamaGru\nclick on link below to verify your account";
            $msg = wordwrap($msg,70);
            // send email
            mail($emailAddress,"User account verification",$msg);
        }

        public static function signOut() {
            session_destroy();
            return 'bye';
        }

    }
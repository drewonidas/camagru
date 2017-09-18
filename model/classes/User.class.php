<?php

/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 2017/03/25
 * Time: 7:08 AM
 */
class User {
    private $_userID;
    private $_username;
    private $_password;
    private $_email;
    private $_joinDate;
    private $_verified;

    /**
     * UserImage constructor.
     * @param $_userID
     * @param $_username
     * @param $_password
     * @param $_email
     * @param $_joinDate
     * @param $_verified
     */
    public function __construct($_userID, $_username, $_password, $_email, $_joinDate, $_verified) {
        $this->_userID = $_userID;
        $this->_username = $_username;
        $this->_password = $_password;
        $this->_email = $_email;
        $this->_joinDate = $_joinDate;
        $this->_verified = $_verified;
    }

    /**
     * @return mixed
     */
    public function getUserID() {
        return $this->_userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID) {
        $this->_userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getUsername() {
        return $this->_username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username) {
        $this->_username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword() {
        return $this->_password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password) {
        $this->_password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email) {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getJoinDate() {
        return $this->_joinDate;
    }

    /**
     * @param mixed $joinDate
     */
    public function setJoinDate($joinDate) {
        $this->_joinDate = $joinDate;
    }

    /**
     * @return mixed
     */
    public function getVerified() {
        return $this->_verified;
    }

    /**
     * @param mixed $verified
     */
    public function setVerified($verified) {
        $this->_verified = $verified;
    }

}
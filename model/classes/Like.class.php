<?php

/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 2017/03/25
 * Time: 8:02 AM
 */
class Like {
    private $_likeID;
    private $_imageID;
    private $_userID;

    /**
     * Like constructor.
     * @param $_likeID
     * @param $_imageID
     * @param $_userID
     */
    public function __construct($_likeID, $_imageID, $_userID) {
        $this->_likeID = $_likeID;
        $this->_imageID = $_imageID;
        $this->_userID = $_userID;
    }

    /**
     * @return mixed
     */
    public function getLikeID() {
        return $this->_likeID;
    }

    /**
     * @param mixed $likeID
     */
    public function setLikeID($likeID) {
        $this->_likeID = $likeID;
    }

    /**
     * @return mixed
     */
    public function getImageID() {
        return $this->_imageID;
    }

    /**
     * @param mixed $imageID
     */
    public function setImageID($imageID) {
        $this->_imageID = $imageID;
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

}
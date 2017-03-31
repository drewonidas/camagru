<?php

/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 2017/03/25
 * Time: 8:10 AM
 */
class Comment {
    private $_commentID;
    private $_commentText;
    private $_commentDate;
    private $_userID;
    private $_imageID;

    /**
     * Comment constructor.
     * @param $_commentID
     * @param $_commentText
     * @param $_commentDate
     * @param $_userID
     * @param $_imageID
     */
    public function __construct($_commentID, $_commentText, $_commentDate, $_userID, $_imageID) {
        $this->_commentID = $_commentID;
        $this->_commentText = $_commentText;
        $this->_commentDate = $_commentDate;
        $this->_userID = $_userID;
        $this->_imageID = $_imageID;
    }

    /**
     * @return mixed
     */
    public function getCommentID() {
        return $this->_commentID;
    }

    /**
     * @param mixed $commentID
     */
    public function setCommentID($commentID) {
        $this->_commentID = $commentID;
    }

    /**
     * @return mixed
     */
    public function getCommentText() {
        return $this->_commentText;
    }

    /**
     * @param mixed $commentText
     */
    public function setCommentText($commentText) {
        $this->_commentText = $commentText;
    }

    /**
     * @return mixed
     */
    public function getCommentDate() {
        return $this->_commentDate;
    }

    /**
     * @param mixed $commentDate
     */
    public function setCommentDate($commentDate) {
        $this->_commentDate = $commentDate;
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
    public function getImageID() {
        return $this->_imageID;
    }

    /**
     * @param mixed $imageID
     */
    public function setImageID($imageID) {
        $this->_imageID = $imageID;
    }

}
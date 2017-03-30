<?php

/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 2017/03/25
 * Time: 7:09 AM
 */
class UserImage {
    private $_imageID;
    private $_fileName;
    private $_creation_date;
    private $_comments;
    private $_likes;

    /**
     * UserImage constructor.
     * @param $_imageID
     * @param $_fileName
     * @param $_creation_date
     */
    public function __construct($_imageID, $_fileName, $_creation_date) {
        $this->_imageID = $_imageID;
        $this->_fileName = $_fileName;
        $this->_creation_date = $_creation_date;
        $this->_likes = array(); // array of like objects
        $this->_comments = array(); // array of comment objects
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
    public function getFileName() {
        return $this->_fileName;
    }

    /**
     * @param mixed $fileName
     */
    public function setFileName($fileName) {
        $this->_fileName = $fileName;
    }

    /**
     * @return mixed
     */
    public function getCreationDate() {
        return $this->_creation_date;
    }

    /**
     * @param mixed $creation_date
     */
    public function setCreationDate($creation_date) {
        $this->_creation_date = $creation_date;
    }

    /**
     * @return mixed
     */
    public function getComments() {
        return $this->_comments;
    }

    /**
     * @param mixed $comments
     */
    public function addComment($comments) {
        array_push($this->_comments, $comments);
    }

    /**
     * @return mixed
     */
    public function getLikes() {
        return $this->_likes;
    }

    /**
     * @param mixed $likes
     */
    public function setLikes($likes) {
        $this->_likes = $likes;
    }

    public function addLike() {
        $this->_likes++;
    }

    public function removeLike() {
        $this->_likes--;
    }
}
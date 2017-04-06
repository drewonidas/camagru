<?php
 /*
@Author: Dregend Drewonidas <root>
@Date:   Wednesday, October 19, 2016 4:40 AM
@Email:  dlaminiandrew@gmail.com
@Last modified by:   root
@Last modified time: Monday, October 24, 2016 4:09 AM
@License: maDezynIzM.E. 2016
*/

    require('../model/classes/Modal.class.php');

    function setupDBTables() {
        $modal = new Modal();
        $conn = $modal->get_connection();

        try {
            $sql = 'CREATE TABLE IF NOT EXISTS users (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(30) NOT NULL,
                    email VARCHAR(30) NOT NULL,
                    password VARCHAR(50),
                    reg_date TIMESTAMP,
                    verified BOOLEAN)';
            // use exec() because no results are returned
            $conn->exec($sql);
            echo 'Table users created successfully<br/>' . PHP_EOL;

            // create IMGS table
            $sql = "CREATE TABLE IF NOT EXISTS imgs (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    location VARCHAR(128) NOT NULL,
                    img_date TIMESTAMP,
                    user_id INT(6) UNSIGNED NOT NULL)";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo 'Table imgs created successfully<br/>' . PHP_EOL;

            // create COMMENTS table
            $sql = 'CREATE TABLE IF NOT EXISTS comments (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    comm_text VARCHAR(500),
                    type VARCHAR(4) NOT NULL,
                    comm_date TIMESTAMP,
                    user_id INT(6) UNSIGNED NOT NULL,
                    img_id INT(6) UNSIGNED NOT NULL)';
            // use exec() because no results are returned
            $conn->exec($sql);
            echo 'Table comments created successfully<br/>' . PHP_EOL;

            // create IMGS table
            $sql = "CREATE TABLE IF NOT EXISTS likes (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    user_id INT(6) NOT NULL,
                    img_id INT(6) NOT NULL)";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo 'Table likes created successfully<br/>' . PHP_EOL;
        }
        catch(PDOException $e) {
            echo 'sql error' . $e->getMessage();
        }
        $conn = null;
    }
?>

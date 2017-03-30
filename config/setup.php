<?php
    /*
    @Author: Dregend Drewonidas <root>
    @Date:   Thursday, October 20, 2016 2:18 AM
    @Email:  dlaminiandrew@gmail.com
@Last modified by:   root
@Last modified time: Monday, October 24, 2016 3:45 AM
    @License: maDezynIzM.E. 2016
    */

    require('database.php');
    require('tables.php');

    $servername = 'localhost';
    $db_handler = null;
    try {
        $db_handler = new PDO("mysql:host=$servername", $DB_USER, $DB_PASSWORD);
        $db_handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connection to server sucessfull<br/>';
        // create the database
        $sql = 'DROP DATABASE IF EXISTS camagru_db';
        $db_handler->exec($sql);
        $sql = 'CREATE DATABASE IF NOT EXISTS camagru_db';
        $db_handler->exec($sql);
        echo 'database created<br/>';
        $db_handler = null;
        // create the tables
        setupDBTables();
    } catch (PDOException $e) {
        echo 'Connection to db failed: ' . $e->getMessage() . '<br/>';
    }

?>

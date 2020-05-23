<?php
// require
require_once('home/teamncog/config-nco.php');

/**
 * Class NcoDatabase
 * This class will provide the connection to the database and have pre-scripted functions for secure database
 * writing and retrieval.
 */
class NcoDatabase
{

    // pdo object
    private $_dbh;

    function __construct()
    {
        try {
            // create database connection
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            echo "connected!";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
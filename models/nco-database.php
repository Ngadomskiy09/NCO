<?php

// require
require("/home/teamncog/config-nco.php");

/**
 * Class NcoDatabase
 * This class will provide the connection to the database and have pre-scripted functions for secure database
 * writing and retrieval.
 */
class Database
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
        $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    }

    // this function inserts all the data from the form to the database
    function insertData()
    {
        $dataObj = $_SESSION['info'];

        $sql = "INSERT INTO Test VALUES (DEFAULT, :programmer, :program, :status, :date, :rtime, :model, :fwc,
                :media, :make, :ptime, :ptype, :reason, :graphic, :mcd, :buyoff, :instruction, :operator, :date2,
                :po, :machine, :shift, :process, :geometry, :signature, :sigdate, :sig2, :sig2date)";

        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(":programmer", $dataObj->getProgrammer());
        $statement->bindParam(":program", $dataObj->getProgram());
        $statement->bindParam(":status", $dataObj->getStatus());
        $statement->bindParam(":date", $dataObj->getDate());
        $statement->bindParam(":rtime", $dataObj->getRtime());
        $statement->bindParam(":model", $dataObj->getModel());
        $statement->bindParam(":fwc", $dataObj->getFwc());
        $statement->bindParam(":media", $dataObj->getMedia());
        $statement->bindParam(":make", $dataObj->getMake());
        $statement->bindParam(":ptime", $dataObj->getPtime());
        $statement->bindParam(":ptype", $dataObj->getPtype());
        $statement->bindParam(":reason", $dataObj->getReason());
        $statement->bindParam(":graphic", $dataObj->getGraphic());
        $statement->bindParam(":mcd", $dataObj->getMcd());
        $statement->bindParam(":buyoff", $dataObj->getBuyoff());
        $statement->bindParam(":instruction", $dataObj->getInstruction());
        $statement->bindParam(":operator", $dataObj->getOperator());
        $statement->bindParam(":date2", $dataObj->getDate2());
        $statement->bindParam(":po", $dataObj->getPo());
        $statement->bindParam(":machine", $dataObj->getMachine());
        $statement->bindParam(":shift", $dataObj->getShift());
        $statement->bindParam(":process", $dataObj->getProcess());
        $statement->bindParam(":geometry", $dataObj->getGeometry());
        $statement->bindParam(":signature", $dataObj->getSignature());
        $statement->bindParam(":sigdate", $dataObj->getSigdate());
        $statement->bindParam(":sig2", $dataObj->getSig2());
        $statement->bindParam(":sig2date", $dataObj->getSig2date());

        $statement->execute();
    }

    function getData()
    {
        $sql = "SELECT * FROM Test";

        $statement = $this->_dbh->prepare($sql);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
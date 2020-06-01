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
    //TODO: Needs rework to work with new db revision.
    function insertData()
    {
        $dataObj = $_SESSION['info'];

        $sql = "INSERT INTO Test VALUES (DEFAULT, :programmer, :rtime, :model, :fwc, :media, :program, :make, :date, 
                :ptime, :ptype, :status, :reason, :graphic, :mcd, :buyoff, :instruction, :Pnotes, /*:operator, :date2,
                :po, :machine, :shift,*/ :process, :Onotes, :geometry, :signature, :sigdate, :Lnotes, :sig2, :sig2date)";

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
        /*$statement->bindParam(":operator", $dataObj->getOperator());
        $statement->bindParam(":date2", $dataObj->getDate2());
        $statement->bindParam(":po", $dataObj->getPo());
        $statement->bindParam(":machine", $dataObj->getMachine());
        $statement->bindParam(":shift", $dataObj->getShift());*/
        $statement->bindParam(":process", $dataObj->getProcess());
        $statement->bindParam(":geometry", $dataObj->getGeometry());
        $statement->bindParam(":signature", $dataObj->getSignature());
        $statement->bindParam(":sigdate", $dataObj->getSigdate());
        $statement->bindParam(":sig2", $dataObj->getSig2());
        $statement->bindParam(":sig2date", $dataObj->getSig2date());
        $statement->bindParam(":Pnotes", $dataObj->getPnotes());
        $statement->bindParam(":Lnotes", $dataObj->getLnotes());
        $statement->bindParam(":Onotes", $dataObj->getOnotes());


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

    function getUpdate($formID)
    {
        $sql = "SELECT * FROM Test WHERE formID = :formID";

        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(":formID", $formID);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    //GET tooling_sequence
    function getToolingSequence($id)
    {
        $sql = "SELECT * FROM `tooling_sequence`
                WHERE `formID` = :id";

        $statement = $this->_dbh->prepare($sql);


        $statement->bindParam(':id', $id, PDO::PARAM_STR);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    //SET tooling_sequence
    function setToolingSequence($formID, $toolNum1, $toolDes1, $programmers_notes,
                                $operators_notes, $mto_comments, $fr_rpm_100,
                                $tooling_mto_status, $toolNum2=NULL, $toolDes2=NULL,
                                $file_url=NULL)
    {
        $sql = "INSERT INTO `tooling_sequence`
                VALUES(DEFAULT, :formID, :toolNum1, :toolDes1, :programmers_notes,
                                :operators_notes, :mto_comments, :fr_rpm_100,
                                :tooling_mto_status, :toolNum2, :toolDec2, :file_url)";

        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(':formID', $formID, PDO::PARAM_STR);
        $statement->bindParam(':toolNum1', $toolNum1, PDO::PARAM_STR);
        $statement->bindParam(':toolDes1', $toolDes1, PDO::PARAM_STR);
        $statement->bindParam(':toolNum2', $toolNum2, PDO::PARAM_STR);
        $statement->bindParam(':toolDec2', $toolDes2, PDO::PARAM_STR);
        $statement->bindParam(':programmers_notes', $programmers_notes, PDO::PARAM_STR);
        $statement->bindParam(':operators_notes', $operators_notes, PDO::PARAM_STR);
        $statement->bindParam(':mto_comments', $mto_comments, PDO::PARAM_STR);
        $statement->bindParam(':fr_rpm_100', $fr_rpm_100, PDO::PARAM_STR);
        $statement->bindParam(':tooling_mto_status', $tooling_mto_status, PDO::PARAM_STR);
        $statement->bindParam(':file_url', $file_url, PDO::PARAM_STR);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    //GET cutter_list
    function getCutterList($id)
    {
        $sql = "SELECT * FROM `cutter_list`
                WHERE `formID` = :id";

        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(':id', $id, PDO::PARAM_STR);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    //SET cutter_list
    function setCutterList($formID, $cutter_list_number, $tool_id,
                           $tool_description, $tool_num)
    {
        $sql = "INSERT INTO `cutter_list`
                VALUES(DEFAULT, :formID, :cutter_list_number, :tool_id,
                       :tool_description, :tool_num)";

        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(':formID', $formID, PDO::PARAM_STR);
        $statement->bindParam(':cutter_list_number', $cutter_list_number, PDO::PARAM_STR);
        $statement->bindParam(':tool_id', $tool_id, PDO::PARAM_STR);
        $statement->bindParam(':tool_description', $tool_description, PDO::PARAM_STR);
        $statement->bindParam(':tool_num', $tool_num, PDO::PARAM_STR);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    //GET first_part_mto_run
    function getFirstPartMtoRun($id)
    {
        $sql = "SELECT * FROM `first_part_mto_run`
                WHERE `formID` = :id";

        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(':id', $id, PDO::PARAM_STR);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    //SET first_part_mto_run
    function setFirstPartMtoRun($formID, $operators_name, $date, $p_o_num,
                                $machine, $shift, $seq_from_to)
    {
        $sql = "INSERT INTO `first_part_mto_run`
                VALUES(DEFAULT, :formID, :operators_name, :date, :p_o_num,
                       :machine, :shift, :seq_from_to)";

        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(':formID', $formID, PDO::PARAM_STR);
        $statement->bindParam(':operators_name', $operators_name, PDO::PARAM_STR);
        $statement->bindParam(':date', $date, PDO::PARAM_STR);
        $statement->bindParam(':p_o_num', $p_o_num, PDO::PARAM_STR);
        $statement->bindParam(':machine', $machine, PDO::PARAM_STR);
        $statement->bindParam(':shift', $shift, PDO::PARAM_STR);
        $statement->bindParam(':seq_from_to', $seq_from_to, PDO::PARAM_STR);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    //GET quality_alert
    function getQualityAlert($id)
    {
        $sql = "SELECT * FROM `quality_alert`
                WHERE `formID` = :id";

        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(':id', $id, PDO::PARAM_STR);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    //SET quality_alert
    function setQualityAlert($formID, $operators_signature, $work_order, $machine,
                             $date, $part_number, $error_discrepancy, $cause)
    {
        $sql = "INSERT INTO `quality_alert`
                VALUES(DEFAULT, :formID, :operators_name, :work_order,
                       :machine, :date, :part_number, :error_discrepancy, :cause)";

        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(':formID', $formID, PDO::PARAM_STR);
        $statement->bindParam(':operators_name', $operators_signature, PDO::PARAM_STR);
        $statement->bindParam(':work_order', $work_order, PDO::PARAM_STR);
        $statement->bindParam(':machine', $machine, PDO::PARAM_STR);
        $statement->bindParam(':date', $date, PDO::PARAM_STR);
        $statement->bindParam(':part_number', $part_number, PDO::PARAM_STR);
        $statement->bindParam(':error_discrepancy', $error_discrepancy, PDO::PARAM_STR);
        $statement->bindParam(':cause', $cause, PDO::PARAM_STR);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function idExist($formId){

    }
}

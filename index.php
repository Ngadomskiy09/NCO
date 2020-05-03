<?php
//turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

//require autoload file
require_once('vendor/autoload.php');

//session start
session_start();

//create instance of the base class
$f3 = Base::instance();

//Set debug level
$f3->set('DEBUG', 3);

$f3->set('status', array('MOT 1', 'MTO 2', 'MTO 3', 'MTO 4', 'MTO 5', 'Marginal', 'No buy-off', 'Needs L/O re-check', 'PRO'));
$f3->set('reason', array('Improvement', 'change', 'SAT'));
$f3->set('graphic', array('Vericut', 'Deneb', 'NCPSR'));
$f3->set('mcd', array('yes','no'));
$f3->set('buyoff', array('Yes1', 'No1', 'marginal1', 'marginal2','na'));
$f3->set('instructions', array('with', 'without'));
$f3->set('shift', array('1', '2', '3'));
$f3->set('process', array('yes2', 'no2', 'needs'));
$f3->set('geometry', array('yes3', 'no3', 'marginal2', 'LO', 're-check'));


//define a default route
$f3->route('GET /', function () {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get DAta from from
        $programmer = $_POST['programmer'];
        $rtime = $_POST['rtime'];
        $model = $_POST['model'];
        $fwc = $_POST['fwc'];
        $media = $_POST['media'];
        $program = $_POST['program'];
        $make = $_POST['make'];
        $date = $_POST['date'];
        $ptime = $_POST['ptime'];
        $status = $_POST['status'];
        $reason = $_POST['reason'];
        $graphic = $_POST['graphic'];
        $mcd = $_POST['mcd'];
        $buyoff = $_POST['buyoff'];
        $instructions = $_POST['instructions'];
        $Pnotes = $_POST['Pnotes'];
        $operator = $_POST['operator'];
        $date2 = $_POST['date2'];
        $po = $_POST['po'];
        $machine = $_POST['machine'];
        $shift = $_POST['shift'];
        $seq = $_POST['seq'];
        $process = $_POST['process'];
        $Onotes = $_POST['Onotes'];
        $geometry = $_POST['geometry'];
        $signature = $_POST['signature'];
        $sigdate = $_POST['sig-date'];
        $Lnotes = $_POST['Lnotes'];
        $sig2 = $_POST['sig2'];
        $sig2date = $_POST['sig2-date'];

        // Add Data to hive
        $this->_f3->set('programmer', $programmer);
        $this->_f3->set('rtime', $rtime);
        $this->_f3->set('model', $model);
        $this->_f3->set('fwc', $fwc);
        $this->_f3->set('media', $media);
        $this->_f3->set('program', $program);
        $this->_f3->set('make', $make);
        $this->_f3->set('date', $date);
        $this->_f3->set('ptime', $ptime);
        $this->_f3->set('status', $status);
        $this->_f3->set('reason', $reason);
        $this->_f3->set('graphic', $graphic);
        $this->_f3->set('mcd', $mcd);
        $this->_f3->set('buyoff', $buyoff);
        $this->_f3->set('instructions', $instructions);
        $this->_f3->set('Pnotes', $Pnotes);
        $this->_f3->set('operator', $operator);
        $this->_f3->set('date2', $date2);
        $this->_f3->set('po', $po);
        $this->_f3->set('machine', $machine);
        $this->_f3->set('shift', $shift);
        $this->_f3->set('seq', $seq);
        $this->_f3->set('process', $process);
        $this->_f3->set('Onotes', $Onotes);
        $this->_f3->set('geometry', $geometry);
        $this->_f3->set('signature', $signature);
        $this->_f3->set('sig-date', $sigdate);
        $this->_f3->set('Lnotes', $Lnotes);
        $this->_f3->set('sig2', $sig2);
        $this->_f3->set('sig2-date', $sig2date);

        // Write Data to session
        $_SESSION['programmer'] = $programmer;
        $_SESSION['rtime'] = $rtime;
        $_SESSION['model'] = $model;
        $_SESSION['fwc'] = $fwc;
        $_SESSION['media'] = $media;
        $_SESSION['program'] = $program;
        $_SESSION['make'] = $make;
        $_SESSION['date'] = $date;
        $_SESSION['ptime'] = $ptime;
        $_SESSION['status'] = $status;
        $_SESSION['reason'] = $reason;
        $_SESSION['graphic'] = $graphic;
        $_SESSION['mcd'] = $mcd;
        $_SESSION['buyoff'] = $buyoff;
        $_SESSION['instructions'] = $instructions;
        $_SESSION['Pnotes'] = $Pnotes;
        $_SESSION['operator'] = $operator;
        $_SESSION['date2'] = $date2;
        $_SESSION['po'] = $po;
        $_SESSION['machine'] = $machine;
        $_SESSION['shift'] = $shift;
        $_SESSION['seq'] = $seq;
        $_SESSION['process'] = $process;
        $_SESSION['Onotes'] = $Onotes;
        $_SESSION['geometry'] = $geometry;
        $_SESSION['signature'] = $signature;
        $_SESSION['sig-date'] = $sigdate;
        $_SESSION['Lnotes'] = $Lnotes;
        $_SESSION['sig2'] = $sig2;
        $_SESSION['sig2-date'] = $sig2date;



    }
    $view = new Template();

    echo $view->render('views/home.html');
});

//run fat free
$f3->run();

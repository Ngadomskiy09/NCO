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

$routes = new Routes($f3);

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
$f3->route('GET|POST /', function() {
    $_SESSION = array();
    $GLOBALS['routes']->home();
});

//Define a results summary route
$f3->route('GET|POST /summary', function() {
    $GLOBALS['routes']->summary();
});

//run fat free
$f3->run();

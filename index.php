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

// array setup
$f3->set('stat', array('', 'Marginal', 'No buy-off', 'Needs L/O re-check', 'Waiting for Team Lead signature', 'PRO'));
$f3->set('reasons', array('', 'Improvement', 'change', 'SAT'));
$f3->set('graphics', array('', 'Vericut', 'Deneb', 'NCPSR'));
$f3->set('mcds', array('', 'yes','no'));
$f3->set('buyoffs', array('', 'Yes', 'No', 'Marginal (L/O)', 'Marginal (Shop)','N/A'));
$f3->set('instructions', array('', 'Programmer presence required', 'Ok to run without programmer'));
$f3->set('shifts', array('', '1', '2', '3'));
$f3->set('processes', array('', 'Yes', 'No', 'Still needs work'));
$f3->set('geometrys', array('', 'Yes', 'No', 'Marginal', 'L/O in process', 'Re-check required'));
$f3->set('mtostat', array('', 'Ran Good!', 'Marginal', 'Not Acceptable', 'Other(Add Comments)'));


//define a default route
$f3->route('GET /', function() {
    $GLOBALS['routes']->loginpage();
});

//route to home page
$f3->route('GET|POST /home', function() {
    $_SESSION = array();
    $GLOBALS['routes']->home();
});

//Define a results summary route
$f3->route('GET|POST /summary', function() {
    $GLOBALS['routes']->summary();
});

//run fat free
$f3->run();

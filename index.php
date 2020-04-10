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

//define a default route
$f3->route('GET /', function () {
    $view = new Template();

    echo $view->render('views/home.html');
});

//run fat free
$f3->run();

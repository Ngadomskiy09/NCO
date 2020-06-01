<?php

class Routes
{
    private $_f3;
    private $_dbh;

    function __construct($f3)
    {
        $this->_f3 = $f3;
        $this->_dbh = new Database();
    }

    function loginpage()
    {
        // check if user is already logged in
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            $this->_f3->reroute("views/data.html");
            exit;
        }

        // process data when form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Define variables and initialize with empty values
            $username = $password = "";
            $username_err = $password_err = "";

            // Check if username is empty
            if (empty(trim($_POST['username']))) {
                $username_err = "Please enter a username.";
                $this->_f3->set('username_err', $username_err);
            } else {
                $username = trim($_POST['username']);
                $this->_f3->set('username', $username);
            }

            // check if password is empty
            if (empty(trim($_POST['password']))) {
                $password_err = "Please enter a password.";
                $this->_f3->set('password_err', $password_err);
            } else {
                $password = trim($_POST['password']);
            }

            // validate credentials
            if (empty($username_err) && empty($password_err)) {
                echo "into validate";
                $result = $this->_dbh->login($username, $password);
                if (!empty($result)) {
                    // password is correct, start a new session
                    session_start();

                    // store data in session variables
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['username'] = $result['username'];

                    // redirect user to data page
                    $this->_f3->reroute("views/data.html");
                } else {
                    $error = "The username or password was incorrect.";
                    $this->_f3->set('error', $error);
                }
            }
        }


        $views = new Template();
        echo $views->render("loginpage.html");
    }


    function home($id)
    {
        $grab = $this->_dbh->getUpdate($id);
        $grab = $grab[0];

        // Add Data to hive
        $this->_f3->set('programmer', $grab['Programmer']);
        $this->_f3->set('rtime', $grab['Runtime']);
        $this->_f3->set('model', $grab['Model']);
        $this->_f3->set('fwc', $grab['FWC']);
        $this->_f3->set('media', $grab['Media']);
        $this->_f3->set('program', $grab['Program_number']);
        $this->_f3->set('make', $grab['Used_to_make']);
        $this->_f3->set('date', $grab['Program_Date']);
        $this->_f3->set('ptime', $grab['Program_Time']);
        $this->_f3->set('ptype', $grab['Program_type']);
        $this->_f3->set('stats', $grab['Part_Status']);
        $this->_f3->set('reason4', $grab['Rev_reason']);
        $this->_f3->set('graph', $grab['Graphic']);
        $this->_f3->set('mc', $grab['MCD_compare']);
        $this->_f3->set('bf', $grab['Prev_buy_off']);
        $this->_f3->set('instruct', $grab['Programmers_instructions']);
        $this->_f3->set('Pnotes', $grab['programmers_notes']);
        $this->_f3->set('operator', $grab['operator']);
        $this->_f3->set('date2', $grab['date2']);
        $this->_f3->set('po', $grab['po']);
        $this->_f3->set('machine', $grab['machine']);
        $this->_f3->set('shi', $grab['shi']);
        $this->_f3->set('seq', $grab['seq']);
        $this->_f3->set('pro', $grab['pro']);
        $this->_f3->set('Onotes', $grab['operators_notes']);
        $this->_f3->set('geo', $grab['Geometry']);
        $this->_f3->set('signature', $grab['Signature']);
        $this->_f3->set('sigdate', $grab['Layout_Date']);
        $this->_f3->set('tool', $grab['tool']);
        $this->_f3->set('desc', $grab['desc']);
        $this->_f3->set('tool1', $grab['tool1']);
        $this->_f3->set('desc1', $grab['desc1']);
        $this->_f3->set('pronotes', $grab['pronotes']);
        $this->_f3->set('opernotes', $grab['opernotes']);
        $this->_f3->set('mtostatus', $grab['mtostatus']);
        $this->_f3->set('rpmran', $grab['rpmran']);
        $this->_f3->set('mtocomments', $grab['mtocomments']);
        $this->_f3->set('Lnotes', $grab['layout_notes']);
        $this->_f3->set('sig2', $grab['Shop_signature']);
        $this->_f3->set('sig2date', $grab['Shop_Date']);
        $this->_f3->set('process', $grab['Milling_proc']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get Data from from
            //$grab = $grab[0];
            $programmer = $_POST['programmer'];
            $rtime = $_POST['rtime'];
            $model = $_POST['model'];
            $fwc = $_POST['fwc'];
            $media = $_POST['media'];
            $program = $_POST['program'];
            $make = $_POST['make'];
            $date = $_POST['date'];
            $ptime = $_POST['ptime'];
            $ptype = $_POST['ptype'];
            $status = $_POST['status'];
            $reason = $_POST['reason'];
            $graphic = $_POST['graphic'];
            $mcd = $_POST['mcd'];
            $buyoff = $_POST['buyoff'];
            $instruction = $_POST['instruction'];
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
            $sigdate = $_POST['sigdate'];
            $tool = $_POST['tool'];
            $desc = $_POST['desc'];
            $tool1 = $_POST['tool1'];
            $desc1 = $_POST['desc1'];
            $pronotes = $_POST['pronotes'];
            $opernotes = $_POST['opernotes'];
            $mtostatus = $_POST['mtostatus'];
            $rpmran = $_POST['rpmran'];
            $mtocomments = $_POST['mtocomments'];
            $Lnotes = $_POST['Lnotes'];
            $sig2 = $_POST['sig2'];
            $sig2date = $_POST['sig2date'];

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
            $this->_f3->set('ptype', $ptype);
            $this->_f3->set('stats', $status);
            $this->_f3->set('reason4', $reason);
            $this->_f3->set('graph', $graphic);
            $this->_f3->set('mc', $mcd);
            $this->_f3->set('bf', $buyoff);
            $this->_f3->set('instruct', $instruction);
            $this->_f3->set('Pnotes', $Pnotes);
            $this->_f3->set('operator', $operator);
            $this->_f3->set('date2', $date2);
            $this->_f3->set('po', $po);
            $this->_f3->set('machine', $machine);
            $this->_f3->set('shi', $shift);
            $this->_f3->set('seq', $seq);
            $this->_f3->set('pro', $process);
            $this->_f3->set('Onotes', $Onotes);
            $this->_f3->set('geo', $geometry);
            $this->_f3->set('signature', $signature);
            $this->_f3->set('sigdate', $sigdate);
            $this->_f3->set('tool', $tool);
            $this->_f3->set('desc', $desc);
            $this->_f3->set('tool1', $tool1);
            $this->_f3->set('desc1', $desc1);
            $this->_f3->set('pronotes', $pronotes);
            $this->_f3->set('opernotes', $opernotes);
            $this->_f3->set('mtostatus', $mtostatus);
            $this->_f3->set('rpmran', $rpmran);
            $this->_f3->set('mtocomments', $mtocomments);
            $this->_f3->set('Lnotes', $Lnotes);
            $this->_f3->set('sig2', $sig2);
            $this->_f3->set('sig2date', $sig2date);


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
            $_SESSION['ptype'] = $ptype;
            $_SESSION['status'] = $status;
            $_SESSION['reason'] = $reason;
            $_SESSION['graphic'] = $graphic;
            $_SESSION['mcd'] = $mcd;
            $_SESSION['buyoff'] = $buyoff;
            $_SESSION['instruction'] = $instruction;
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
            $_SESSION['sigdate'] = $sigdate;
            $_SESSION['tool'] = $tool;
            $_SESSION['desc'] = $desc;
            $_SESSION['tool1'] = $tool1;
            $_SESSION['desc1'] = $desc1;
            $_SESSION['pronotes'] = $pronotes;
            $_SESSION['opernotes'] = $opernotes;
            $_SESSION['mtostatus'] = $mtostatus;
            $_SESSION['rpmran'] = $rpmran;
            $_SESSION['mtocomments'] = $mtocomments;
            $_SESSION['Lnotes'] = $Lnotes;
            $_SESSION['sig2'] = $sig2;
            $_SESSION['sig2date'] = $sig2date;
            $_SESSION['info'] = new formData ($_POST['programmer'], $_POST['rtime'], $_POST['model'], $_POST['fwc'],
                $_POST['media'], $_POST['program'], $_POST['make'], $_POST['date'],
                $_POST['ptime'], $_POST['ptype'], $_POST['status'], $_POST['reason'], $_POST['graphic'], $_POST['mcd'],
                $_POST['buyoff'], $_POST['instruction'], $_POST['operator'], $_POST['date2'], $_POST['po'],
                $_POST['machine'], $_POST['shift'], $_POST['process'], $_POST['geometry'], $_POST['signature'],
                $_POST['sigdate'], $_POST['sig2'], $_POST['sig2date'], $_POST['Pnotes'], $_POST['Onotes'], $_POST['Lnotes']);

            $this->_f3->reroute('/summary');

        }
        $views = new Template();
        echo $views->render('views/home.html');
    }

    function summary()
    {
        $this->_dbh->insertData();
        $views = new Template();
        echo $views->render("views/summary.html");
    }

    function data()
    {
        $this->_f3->set('dataInfo', $this->_dbh->getData());

        $views = new Template();
        echo $views->render("views/data.html");
    }
}

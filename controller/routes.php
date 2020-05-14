<?php

class Routes
{
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function loginpage()
    {
        $views = new Template();
        echo $views->render("loginpage.html");
    }


    function home()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            $ptype = $_POST['ptype'];
            $status = $_POST['status'];
            $rev = $_POST['rev'];
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
            $this->_f3->set('rev', $rev);
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
                $_SESSION['rev'] = $rev;
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
                $_SESSION['Lnotes'] = $Lnotes;
                $_SESSION['sig2'] = $sig2;
                $_SESSION['sig2date'] = $sig2date;

                $this->_f3->reroute('/summary');

        }
        $views = new Template();
        echo $views->render('views/home.html');
    }

    function summary()
    {
        $views = new Template();
        echo $views->render("views/summary.html");
    }
}
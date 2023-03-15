<?php

namespace Controllers;

session_start();

use Core\Authentication;
use Core\Controller;
use Core\Request;
use Core\Session;

class DashboardController extends Authentication
{

    public function __construct()
    {
        parent::__construct('dashboard');
    }

    public function index()
    {
        //login function cekeck
        $this->setlayout('dashbordLayout');
        return $this->view('/dashboard');
        

    }
}

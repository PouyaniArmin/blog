<?php

namespace Controllers;

use Core\Authentication;
use Core\Controller;
use Core\Database;
use Core\Model;
use Core\Request;
use PDO;
use PDOException;

class DashboardController extends Authentication
{
    public function index(Request $request)
    {
        return $this->authorization($request,$request->body(),'dashboard');
    }

}
<?php

namespace Controllers;

use Core\Authentication;
use Core\Controller;
use Core\Database;
use Core\Model;
use Core\Request;

class PostsController extends Authentication
{
    public function index(Request $request)
    {
        $body=$request->body();
        return $this->authorization($request,$body,'posts');
    }
}

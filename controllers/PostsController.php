<?php 

namespace Controllers;

use Core\Application;
use Core\Authentication;
use Core\Controller;
use Core\Session;

class PostsController extends Authentication{
    public function __construct()
    {
        parent::__construct('posts');
    }
    public function index(){
        return $this->view('post');
    }
}
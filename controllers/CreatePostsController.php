<?php 
namespace Controllers;

use Core\Controller;

class CreatePostsController extends Controller{
    public function index(){
        $this->setLayout('dashboard');
        return $this->view('createPosts');
    }
}
?>
<?php 
namespace Core;
class Request{
    public function path(){
      $path=$_SERVER['REQUEST_URI'] ?? '';
      $position=strpos($path,"?");
      if ($position===false) {
        return $path;
      }
      return substr($path,0,$position);
    }
    public function method(){
      return strtolower($_SERVER['REQUEST_METHOD']);
    }
    public function get(){
      return $this->method()==='get';
    }

    public function post(){
      return $this->method()==='post';
    }
    public function body(){
      $data=[];
      if ($this->method()==='get') {
        foreach($_GET as $key=>$value){
          $data[$key]=$value;
        }
      }
      if ($this->method()==='post') {
        foreach($_POST as $key=>$value){
          $data[$key]=$value;
        }
      }
      return $data;
    }
}
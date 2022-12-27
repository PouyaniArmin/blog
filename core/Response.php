<?php 
namespace Core;
class Response{
    public function codeStatus(int $code){
        http_response_code($code);
    }
}
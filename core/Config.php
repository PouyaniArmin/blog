<?php 

namespace Core;
class Config{

    public static function dbConfig(){
        return[
            'host'=>$_ENV['DB_HOST'],
            'db_username'=>$_ENV['DB_USER'],
            'db_password'=>$_ENV['DB_PASSWORD'],
            'db_table'=>$_ENV['DB_NAME']
        ];
    }
}
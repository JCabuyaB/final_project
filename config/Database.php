<?php
namespace config;
use mysqli;

class Database{
    public static function connect(){
        $db = new mysqli('localhost', 'jin', '100136', 'burger_jin');

        if($db->connect_error){
            die('conexion fallida: '.$db->connect_error);
        }

        $db->query("SET NAMES 'utf8'");

        return $db;
    }
}
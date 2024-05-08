<?php
namespace controllers;

class Errors
{
    public function error404()
    {
        require_once 'views/errors/404.php'; 
    }
}

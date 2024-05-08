<?php

class Role{
    private $id;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // id
    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    // nombre
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }
    
}


<?php

class Product{
    private $id;
    private $nombre;
    private $imagen;
    private $descripcion;
    private $precio;
    private $calorias;
    private $id_categoria;
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

    // imagen
    public function setImagen($imagen){
        $this->imagen = $imagen;
    }

    public function getImagen(){
        return $this->imagen;
    }

    // descripcion
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    // precio
    public function setPrecio($precio){
        $this->precio = $precio;
    }

    public function getPrecio(){
        return $this->precio;
    }

    // calorias
    public function setCalorias($calorias){
        $this->calorias = $calorias;
    }

    public function getCalorias(){
        return $this->calorias;
    }

    // id_categoria
    public function setIdCategoria($id_categoria){
        $this->id_categoria = $id_categoria;
    }

    public function getIdCategoria(){
        return $this->id_categoria;
    }
}
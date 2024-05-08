<?php
class Order{
    private $codigo;
    private $departamento;
    private $ciudad;
    private $direccion;
    private $valor_total;
    private $estado;
    private $fecha;
    private $hora;
    private $id_usuario;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // codigo
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    // departamento
    public function setDepartamento($departamento){
        $this->departamento = $departamento;
    }

    public function getDepartamento(){
        return $this->departamento;
    }

    // ciudad
    public function setCiudad($ciudad){
        $this->ciudad = $ciudad;
    }

    public function getCiudad(){
        return $this->ciudad;
    }

    // direccion
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    // valor_total
    public function setValorTotal($valor_total){
        $this->valor_total = $valor_total;
    }

    public function getValorTotal(){
        return $this->valor_total;
    }

    // estado
    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getEstado(){
        return $this->estado;
    }

    // fecha
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getFecha(){
        return $this->fecha;
    }

    // hora
    public function setHora($hora){
        $this->hora = $hora;
    }

    public function getHora(){
        return $this->hora;
    }

    // id_usuario
    public function setIdUsuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }

    public function getIdUsuario(){
        return $this->id_usuario;
    }
}
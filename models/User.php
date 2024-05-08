<?php

namespace models;

// database
use config\Database;

class User
{
    private $id;
    private $nombre;
    private $apellidos;
    private $correo;
    private $contrasenia;
    private $id_rol = 2; //después hay que revisar si es un administrador
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // nombre
    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    // apellidos
    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    // correo
    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = strtolower($correo);
    }

    // password
    public function getContrasenia()
    {
        return $this->contrasenia;
    }

    public function setContrasenia($contrasenia)
    {
        $this->contrasenia = $contrasenia;
    }

    // id_rol
    public function getIdRol()
    {
        return $this->id_rol;
    }

    public function setIdRol($id_rol)
    {
        $this->id_rol = $id_rol;
    }

    // registro de usuario
    public function registrar_usuario()
    {
        // consulta a ejecutar
        $query = "INSERT INTO tbl_usuarios VALUES (null, {$this->getIdRol()}, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getCorreo()}', '{$this->getContrasenia()}');";

        //ejecutar consulta y almacenar su resultado
        $result = $this->db->query($query);

        // flag para validar en el controlador
        $register = false;
        if ($result) {
            $register = true;
        }

        return $register;
    }

    // actalizar usuario
    public function actualizar_usuario($current_pass, $current_mail)
    {
        // consulta a ejecutar
        $result = false;

        // consulta para los datos del usuario
        $query_select = "SELECT * FROM tbl_usuarios WHERE correo = '{$current_mail}';";

        $sql = $this->db->query($query_select);
        if ($sql && $sql->num_rows == 1) {
            $usuario = $sql->fetch_object();

            // verificar contraseña
            $verify_pass = password_verify($current_pass, $usuario->user_pass);

            if ($verify_pass) {
                // consulta para actualizar los datos del usuario
                $query_update = "UPDATE tbl_usuarios SET nombre = '{$this->getNombre()}', apellidos = '{$this->getApellidos()}', correo = '{$this->getCorreo()}', user_pass = '{$this->getContrasenia()}' WHERE id = {$this->getId()};";

                $sql = $this->db->query($query_update);

                if ($sql) {
                    $result = true;
                }
            }
        }
        return $result = true;
    }

    // login user
    public function iniciar_sesion()
    {
        // flag para validar
        $result = false;
        // consulta a ejecutar
        $query = "SELECT * FROM tbl_usuarios WHERE correo = '{$this->getCorreo()}'";

        //ejecutar consulta y almacenar su resultado
        $user = $this->db->query($query);

        if ($user && $user->num_rows == 1) {
            $login = $user->fetch_object();

            // verificar contraseña
            $verify_pass = password_verify($this->getContrasenia(), $login->user_pass);
            if ($verify_pass) {
                $result = $login;
            }
        }

        return $result;
    }

    // eliminar usuario
    public function deleteUser()
    {
    }
}

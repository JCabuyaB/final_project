<?php
namespace helpers;

class User{
    // funciones para validacion de los datos del usuario
    function validar_email($email)
    {
        $result = false;
        if (empty($email)) {
            $result= "El correo no puede estar vacío.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = "El correo no posee un formato válido.";
        }

        return $result;
    }

    function validar_nombre_apellido($dato, $nombre_dato)
    {
        $result = false;
        if (empty($dato)) {
            $result = 'El ' . $nombre_dato . ' no puede estar vacío.';
        } elseif (preg_match('/[0-9]/', $dato)) {
            $result = 'El ' . $nombre_dato . ' no puede tener numeros.';
        }

        return $result;
    }

    function validar_clave($clave)
    {
        $result = false;
        if (empty($clave)) {
            $result = "La contraseña no puede estar vacía.";
        } elseif (strlen($clave) < 7) {
            $result = "El campo debe tener 7 o más caracteres.";
        } elseif (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d).+$/', $clave)) {
            $result = "La contraseña debe tener numeros y letras.";
        }

        return $result;
    }

    function comparar_clave($clave1, $clave2){
        $result = false;
        if($clave1 !== $clave2){
            $result = "Las contraseñas no coinciden";
        }

        return $result;
    }
}

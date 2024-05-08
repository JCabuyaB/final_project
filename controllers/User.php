<?php

namespace controllers;

use models\User as UserModel;
use helpers\User as UserHelpers;

class User
{
    // mostrar vista de registro y login
    public function login()
    {
        if (!isset($_SESSION['user'])) {
            require_once 'views/user/login.php';
        } else {
            header('Location: ' . base_url);
        }
    }

    public function register()
    {
        if (!isset($_SESSION['user'])) {
            require_once 'views/user/register.php';
        } else {
            header('Location: ' . base_url);
        }
    }

    // mostrar vista de actualizar datos
    public function update()
    {
        if (isset($_SESSION['user'])) {
            require_once 'views/user/update.php';
        } else {
            header('Location: ' . base_url);
        }
    }

    // registrar a un usuario
    public function user_register()
    {
        // verificar si hay post
        if (isset($_POST)) {
            // guardar datos si existen
            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $pass = isset($_POST['pass']) ? $_POST['pass'] : false;
            $confirm_pass = isset($_POST['confirm_pass']) ? $_POST['confirm_pass'] : false;
            // errores
            $errors = array();

            // validar los datos guardados
            // nombre
            if (empty($name)) {
                $errors['name'] = "El nombre no puede estar vacío.";
            } elseif (preg_match('/[0-9]/', $name)) {
                $errors['name'] = "El nombre no puede tener numeros.";
            }

            // apellido
            if (empty($last_name)) {
                $errors['last_name'] = "El apellido no puede estar vacío.";
            } elseif (preg_match('/[0-9]/', $last_name)) {
                $errors['last_name'] = "El apellido no puede tener numeros.";
            }

            // correo
            if (empty($email)) {
                $errors['email'] = "El correo no puede estar vacío.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "El correo no posee un formato válido.";
            }

            // pass
            if (empty($pass)) {
                $errors['pass'] = "La contraseña no puede estar vacía.";
            } elseif (strlen($pass) < 7) {
                $errors['pass'] = "La contraseña debe tener 7 o más caracteres.";
            } elseif (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d).+$/', $pass)) {
                $errors['pass'] = "La contraseña debe numeros y letras.";
            }

            // pass confirmation
            if (empty($confirm_pass)) {
                $errors['confirm_pass'] = "La contraseña no puede estar vacía.";
            } elseif (strlen($confirm_pass) < 7) {
                $errors['confirm_pass'] = "La contraseña debe tener 7 o más caracteres.";
            } elseif (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d).+$/', $confirm_pass)) {
                $errors['confirm_pass'] = "La contraseña debe numeros y letras.";
            }

            // validar igualdad de contraseñas
            if ($pass !== $confirm_pass) {
                $errors['passwords'] = "Las contraseñas no coinciden";
            }

            // realizar accion en base a el resultado de las validaciones
            if (count($errors) == 0) {
                // encriptar contraseña
                $secure_pass = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 4]);

                // asignar valores al objeto de usuario para registrarlo
                $usuario = new UserModel();
                $usuario->setNombre($name);
                $usuario->setApellidos($last_name);
                $usuario->setCorreo($email);
                $usuario->setContrasenia($secure_pass);

                // ejecutar el registro de usuario
                $result = $usuario->registrar_usuario();

                if ($result) {
                    // session ok
                    $_SESSION['user_register_status'] = "success";
                } else {
                    // session error
                    $_SESSION['user_register_status'] = "failed";
                }
            } else {
                // crear la sesion de los errores
                $_SESSION['user_register_errors'] = $errors;
            }
        } else {
            // flag para mostrar error en la vista
            $_SESSION['user_register_status'] = "failed";
        }
        header('Location: ' . base_url . 'user/register');
    }

    // inicio de sesion
    public function user_login()
    {
        if (isset($_POST)) {
            // objeto de helpers
            $helpers = new UserHelpers();

            // recoger los datos si existen y hay post
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $pass = isset($_POST['password']) ? $_POST['password'] : false;
            // errores
            $errors = array();

            // validaciones de los datos
            // correo
            $email_validation = $helpers->validar_email($email);
            if ($email_validation) {
                $errors['email'] = $email_validation;
            }

            // pass
            $pass_validation = $helpers->validar_clave($pass);
            if ($pass_validation) {
                $errors['pass'] = $pass_validation;
            }

            if (count($errors) == 0) {
                // crear objeto y asignar valores utilizados en la funcion del modelo
                $usuario = new UserModel();
                $usuario->setCorreo($email);
                $usuario->setContrasenia($pass);

                // ejecutar la funcion y guardar su resultado
                $result = $usuario->iniciar_sesion();

                if ($result && is_object($result)) {
                    $_SESSION['user'] = $result;
                    header('Location: ' . base_url);
                } else {
                    $_SESSION['user_login_error'] = "failed";
                }
            } else {
                $_SESSION['user_login_errors'] = $errors;
            }
        } else {
            // flag para mostrar error en la vista
            $_SESSION['user_login_error'] = true;
        }
        header('Location: ' . base_url . 'user/login');
    }

    // actualizar datos de usuario
    public function user_update()
    {
        if (isset($_POST) && $_SESSION['user']) {
            // objeto para validar
            $helpers = new UserHelpers();

            // recoger datos si existen
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : false;
            $current_pass = isset($_POST['current_pass']) ? $_POST['current_pass'] : false;
            $pass = isset($_POST['pass']) ? $_POST['pass'] : false;
            $confirm_pass = isset($_POST['confirm_pass']) ? $_POST['confirm_pass'] : false;
            // errores 
            $errors = array();

            // validar datos
            // correo
            $email_validation = $helpers->validar_email($email);
            if ($email_validation) {
                $errors['email'] = $email_validation;
            }

            // nombre
            $name_validation = $helpers->validar_nombre_apellido($name, 'nombre');
            if ($name_validation) {
                $errors['name'] = $name_validation;
            }

            // apellidos
            $last_name_validation = $helpers->validar_nombre_apellido($last_name, 'apellido');
            if ($last_name_validation) {
                $errors['last_name'] = $last_name_validation;
            }

            // contraseña actual
            $current_pass_validation = $helpers->validar_clave($current_pass);
            if ($current_pass_validation) {
                $errors['current_pass'] = $current_pass_validation;
            }

            // nueva contraseña
            $pass_validation = $helpers->validar_clave($pass);
            if ($pass_validation) {
                $errors['pass'] = $pass_validation;
            }

            // confirmacion de nueva contraseña 
            $confirm_pass_validation = $helpers->validar_clave($confirm_pass);
            if ($confirm_pass_validation) {
                $errors['confirm_pass'] = $confirm_pass_validation;
            }

            // hacer una accion en base a los errores que se produzcan
            if (count($errors) == 0) {
                //verificar contraseñas
                $pass_compare = $helpers->comparar_clave($pass, $confirm_pass);
                if ($pass_compare) {
                    $_SESSION['user_update_errors']['pass_compare'] = "Las contraseñas no coinciden.";
                } else {
                    //datos para actualizar
                    $id_user = $_SESSION['user']->id;
                    $current_mail = $_SESSION['user']->correo;

                    // crear el objeto para actualizar
                    $usuario = new UserModel();
                    $usuario->setId($id_user);
                    $usuario->setCorreo($email);
                    $usuario->setNombre($name);
                    $usuario->setApellidos($last_name);

                    // encriptar contraseña
                    $secure_pass = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 4]);
                    $usuario->setContrasenia($secure_pass);

                    // ejecutar funcion para actualizar
                    $result = $usuario->actualizar_usuario($current_pass, $current_mail);

                    if ($result) {
                        //actualizo los datos del usuario
                        $_SESSION['user']->nombre = $name;
                        $_SESSION['user']->apellidos = $last_name;
                        $_SESSION['user']->correo = $email;
                        $_SESSION['user']->user_pass = $secure_pass;
                        $_SESSION['user_update_status'] = true;
                    } else {
                        $_SESSION['user_update_status'] = false;
                    }
                }
            } else {
                // sesion para persistir datos con el feedback
                $_SESSION['current_data'] = $_POST;
                // session de errores
                $_SESSION['user_update_errors'] = $errors;
            }
        } else {
            // crear sesion para mostrar el error en la vista
            $_SESSION['user_errors_update']['error'] = "No se completó la actualización.";
        }
        header('Location: ' . base_url . 'user/update');
    }

    // eliminar usuario
    public function user_delete()
    {
    }
}

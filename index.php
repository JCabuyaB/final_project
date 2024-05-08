<!-- autoload -->
<?php require_once 'autoload.php'; ?>
<!-- parametros - constantes -->
<?php require_once 'config/parameters.php' ?>

<!-- clases -->
<?php
// session
session_start();

// helpers
require_once 'helpers/General.php';

// users
// use controllers\User;

// errors
// use controllers\Errors;

// pages
// use controllers\Landing;

?>

<!-- header -->
<?php require_once 'views/layout/header.php'; ?>

<!-- enrutador -->
<?php
// funcion para mostrar  herrores
function show_error(){
    $controller = new controllers\Errors();
    $controller->error404();
}


// verificar existencia y guardar el nombre del controlador
if (isset($_GET['controller'])) {
    // namespace - ruta controller
    $name_controller = $_GET['controller'];

    // clase con su namespace
    $controller_context = controllers_context.$name_controller;
} else if (!isset($_GET['controller']) && !isset($_GET['action'])) {
    // controlador y accion por default
    $name_controller = default_controller;

    // clase con su namespace
    $controller_context = controllers_context.$name_controller;
    $name_action = default_action;
} else{
    show_error();
    exit();
}




// verifico si existe la clase para crearla
if (class_exists($controller_context)) {
    $controller = new $controller_context();
    // verificar si existe la accion
    if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){
        $name_action = $_GET['action'];
        $controller->$name_action();
    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $name_action = default_action;
        $controller->$name_action();
    }else{
        show_error();
    }
}else{
    show_error();
}


?>

<!-- footer -->
<?php require_once 'views/layout/footer.php'; ?>
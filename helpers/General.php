<?php
// eliminar sesion
function delete_session($session){
    if(isset($_SESSION[$session])){
        unset($_SESSION[$session]);
    }
}
<?php
class IniciarControlador{
    public function __construct(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Aquí puedes realizar otras operaciones relacionadas con la sesión, si es necesario.
    }

    public function sesion(){
        // Agrega aquí el código para gestionar la sesión
    }
}
?>

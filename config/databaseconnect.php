<?php
 
class Conexion{
    public $datos;
    public function __construct(){
       // session_start();
    $host = 'localhost';
    $dbname = 'mi_proyecto';
    $username = 'root';
    $password = '';

        try{
            $this->datos = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        }catch (PDOexception $e){
            echo "Error: " . $e->getMessage();
        }
    }
    public function cerrarconexion(){
        $datos = null;
    }

}

?>

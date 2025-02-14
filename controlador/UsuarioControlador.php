<?php
require_once __DIR__ .'/../config/databaseconnect.php';

require_once 'IniciarControlador.php';
require_once __DIR__ .'/../modelo/UsuarioModelo.php';
$ics = new IniciarControlador();

class UsuarioControlador extends Usuario{
    public function __construct(){
    }

    public function redireccionarRegistro(){
        header("location: ../vista/usuarios/registroUsuario.php");
    }

    public function redireccionarInicio(){
        header("location: ../vista/usuarios/catalogo.php");
    }

    public function VerLogin(){
        require '../vista/usuarios/login.php';
    }

    public function GuardarRegistro($Nombre,$Empresa,$Email,$Celular,$Telefono,$Ciudad,$Direccion){
       $this->Nombre = $Nombre;
       $this->Empresa = $Empresa;
       $this->Email = $Email;
       $this->Celular = $Celular;
       $this->Telefono = $Telefono;
       $this->Ciudad = $Ciudad;
       $this->Direccion = $Direccion;
       $this->insertarRegistro();
    }

    
    public function VerificarLogin($User, $Password){
        $this->User = $User;
        $this->Password = $Password;
        $infoUsuario = $this->buscarUsuario();
        foreach($infoUsuario as $usuario){}
        if(password_verify($Password, $usuario->Password)){
            $_SESSION['User'] = $usuario->User;
            $this->redireccionarInicio();
        }
        else{
            echo "Contraseña incorrecta";
        }
    }
    
}

?>
<?php
    if(isset($_POST['action']) && $_POST['action']=='login'){
        $instanciaControlador = new UsuarioControlador();
        $instanciaControlador->VerificarLogin($_POST['User'], $_POST['Password']);
    }

    if(isset($_POST['action']) && $_POST['action']=='registro'){
        $instanciaControlador = new UsuarioControlador();
        $instanciaControlador->GuardarRegistro(
            $_POST['Nombre'],
            $_POST['Empresa'],
            $_POST['Email'],
            $_POST['Celular'],
            $_POST['Telefono'],
            $_POST['Ciudad'],
            $_POST['Direccion']
        );
        $instanciaControlador->redireccionarInicio();
    }


    if(isset($_POST['action']) && $_POST['action']=='insert'){
        $instanciaControlador = new UsuarioControlador();
        $instanciaControlador->User = $_POST['User'];
        $instanciaControlador->Password = $_POST['Password'];
        $instanciaControlador->Estado = $_POST['Estado'];
        $instanciaControlador->Rol = $_POST['Rol'];
        $instanciaControlador->insertarUsuario();
        $instanciaControlador->redireccionarRegistro();
    }




?> 
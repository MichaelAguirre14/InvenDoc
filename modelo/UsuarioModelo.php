<?php
class Usuario{

    public $User;
    public $Password;

    protected $Nombre;
    protected $Empresa;
    protected $Email;
    protected $Celular;
    protected $Telefono;
    protected $Direccion;
    protected $Ciudad;


    function __construct(){
        
    }

    protected function insertarRegistro(){
        $instanciaConexion = new Conexion();
        $sql = "INSERT INTO empresas(NombreCliente, NombreEmpresa, Email, Celular, Telefono, Ciudad, Direccion) values (?,?,?,?,?,?,?)";
        $insertar = $instanciaConexion->datos->prepare($sql);
        $insertar->bindParam(1, $this->Nombre);
        $insertar->bindParam(2, $this->Empresa);
        $insertar->bindParam(3, $this->Email);
        $insertar->bindParam(4, $this->Celular);
        $insertar->bindParam(5, $this->Telefono);
        $insertar->bindParam(6, $this->Ciudad);
        $insertar->bindParam(7, $this->Direccion);
        $insertar->execute();
    }

    public function insertarUsuario(){
        $instanciaConexion = new Conexion();
        $newpassword = password_hash($this->Password, PASSWORD_ARGON2I);
        $insertar = $instanciaConexion->datos->prepare("INSERT INTO usuarios(User, Password, NombreEstado, NombreRol) values (?,?,?,?)");
        $insertar->bindParam(1, $this->User);
        $insertar->bindParam(2, $newpassword);
        $insertar->bindParam(3, $this->Estado);
        $insertar->bindParam(4, $this->Rol);
        $insertar->execute();
    }

    public function mostrarUsuario(){
        $instanciaConexion = new Conexion();
        $datosUsuario = $instanciaConexion->datos->prepare("SELECT * FROM usuarios");
        $datosUsuario->execute();
        $usuarioObjeto = $datosUsuario->fetchAll(PDO::FETCH_OBJ);
        return $usuarioObjeto;
    }

    public function buscarUsuario(){
        $instanciaConexion = new Conexion();
        $sql = "SELECT * FROM usuarios WHERE User = '$this->User'";
        $consulta = $instanciaConexion->datos->prepare($sql);
        $consulta->execute();
        $consultaObjeto = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $consultaObjeto;
    }
    public function mostrarCategorias() {
       $instanciaConexion = new Conexion();
        $datosCategorias = $instanciaConexion->datos->prepare("SELECT * FROM categorias");
        $datosCategorias->execute();
        $categoriasobjeto = $datosCategorias->fetchAll(PDO::FETCH_OBJ);
        return $categoriasobjeto;
    }
    

}

?> 
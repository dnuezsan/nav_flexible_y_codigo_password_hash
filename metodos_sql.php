<?php
require "config.php";

class Metodos_sql{
    protected $conexion;

    function __construct()
    {
        $this->conexion = new mysqli(SERVIDOR, USUARIO, CONTRASENIA, BD);
        if ($this->conexion->connect_errno) {
            echo "Se ha producido un error: ".$this->conexion->connect_errno;
        }
    }

    function registro(){

        $contrasenia = password_hash($_POST['contrasenia'], PASSWORD_DEFAULT, ["cost"=>10]);
echo $_POST["usuario"]."<br>".$_POST["contrasenia"]."<br>".$_POST['permiso'];
        $sql = "INSERT INTO personal VALUES (null,'".$_POST["usuario"]."', '".$contrasenia."', '".$_POST['permiso']."')";

        if ($this->conexion->query($sql)) {
            header("location: usuario_creado.php");
        } else{
            echo "No se pudo completar el registro";
        }
    }

    function inicioSesion(){

        $sql = "SELECT * FROM personal WHERE usuario = '".$_POST["usuario"]."'";

        $resultado= $this->conexion->query($sql);

        if ($resultado->num_rows == 1) {//Comprueba que una fila coincida

            $fila = $resultado->fetch_array(MYSQLI_ASSOC); //Realiza fetch

            if(password_verify($_POST["contrasenia"], $fila["contrasenia"])) {//Compara contraseñas
                
                if ($fila["permiso"]=="cliente") { //Si cumple envia a la página para usuarios
                   Metodos_sql::redireccionUser();
                } else if ($fila["permiso"] == "admin") { //Si cumple envia a la página para administradores
                   Metodos_sql::redireccionAdmin();
                }
            }
        }
    }

    static function redireccionAdmin(){
        header("location: interfaz_admin.php");
    }


    static function redireccionUser(){
        header("location: interfaz_user.php");
    }

}
?>
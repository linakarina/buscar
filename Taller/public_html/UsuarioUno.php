<?php

class UsuarioUno 
{
    public $nombre;
    private $login;
    private $clave;
    public $tipousuario;
    private $conexiondb;

    // Metodo constructor
    function UsuarioUno($l = "", $c = "") {
        $this->login = $l;
        $this->clave = $c;
        
        
        $servername = "localhost";
        $username = "Lina";
        $password = "12345";
        $nombredb = "ejemplodb";

        // Create connection
        $this->conexiondb = new mysqli($servername, $username, $password, $nombredb);
        if ($this->conexiondb->connect_errno)
        {
            
        
            echo "Failed to connect to MySQL: " . $this->conexiondb->connect_errno;
        }
    }




   

   
function isValid() 
    {    
        $sql = "SELECT * FROM usuarios  
                WHERE login = '{$this->login}' AND clave = MD5('{$this->clave}') ";
        if ($resultado = $this->conexiondb->query($sql)){
            if ($row = $resultado->fetch_assoc()) {
                $this->nombre = $row['nombre'];
                $this->tipousuario =$row['tipoUsuario'];
                return true;
            } 
        } else {
            echo "Error al consultar";
        }
        
        return false;
    }

    

}

<?php

class Usuario {

    public $nombre;
    private $login;
    private $clave;
    private $tipousuario;
    private $conexiondb;

    // Metodo constructor
    function Usuario($n="",$l = "", $c = "",$tp="") {
      
        $this->login = $l;
        $this->clave = $c;
        $this->nombre = $n;
        $this->tipousuario = $tp;
     
        
        $servername = "localhost";
        $username = "Lina";
        $password = "12345";
        $nombredb = "ejemplodb";

        // Create connection
        $this->conexiondb = new mysqli($servername, $username, $password, $nombredb);
        if ($this->conexiondb->connect_errno)
        {
             
           echo "Fallo la conexion a Mysql " . $this->conexiondb->connect_errno;
        }
    }

    function registrarUsuario() {
        $sql = "INSERT INTO usuarios (nombre,login, clave,tipousuario)
                VALUES ('{$this->nombre}','{$this->login}', MD5('{$this->clave}'), '{$this->tipousuario}');
                ";
        if (!$this->conexiondb->query($sql)) {
            echo "Ocurrión un error al insertar " .$sql;            
        }
        else
        {
            echo "Registro exitoso";
        }
    }
    
   function leer() {    
        $listaUsuarios = [];
        $sql = "SELECT * FROM usuarios";
        if ($resultado = $this->conexiondb->query($sql)){
            while ($row = $resultado->fetch_assoc()) {
                $listaUsuarios[] = $row;
            }
        } else {
            echo "Error al consultar";
        }
        
        return $listaUsuarios;
    }
   
    
    

}

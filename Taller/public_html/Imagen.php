<?php 
class Imagen {
   
    
      private $imagen;
      private $conexion;
    
      
      function Producto( $imag ="")
      {
          
          
            $this->imagen = $imag;
            
            $servername = "localhost";
            $username = "Lina";
            $password = "12345";
            $nombredb = "ejemplodb";
            
            // Create connection
        $this->conexion = new mysqli($servername, $username, $password, $nombredb);
      
        if ($this->conexion->connect_errno)
        {
            echo "fallo conexion a Mysql " . $this->conexion->connect_errno;
        }
          
      }
      
       function registrar() {
        $sql = "INSERT INTO iamgen(imagen)
                VALUES ('{$this->imagen}');
                ";
        if (!$this->conexion->query($sql)) {
            echo "Ocurrión un error al registrar la imagen " .$sql;            
        }
        else
        {
            echo "Registro exitoso de imagen";
        }
        
    }
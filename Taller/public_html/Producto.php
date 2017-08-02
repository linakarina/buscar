
<?php 
class Producto {
   
     private $nombre;
      private $descripcion;
      private $precio;
      private $imagen;
      private $conexion;
    
      
      function Producto($n = "", $d= "", $p = "", $imag ="")
      {
          
           $this->nombre= $n;
            $this->descripcion = $d;
            $this->precio = $p;
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
        $sql = "INSERT INTO producto(nombre,descripcion, precio,imagen)
                VALUES ('{$this->nombre}', '{$this->descripcion}','{$this->precio}','{$this->imagen}');
                ";
        if (!$this->conexion->query($sql)) {
            echo "Ocurrión un error al registrar el producto " .$sql;            
        }
        else
        {
           ?>
           
           <center>
                    <font size = "70px" color = "#0B0B61" face="Arial Rounded MT Bold">    
                       Registro exitoso de producto 
                    </font> 
            </center>
           <?php
        }
        
    }
    
     function listarProductos() {    
        $listaProductos = [];
        $sql = "SELECT * FROM producto";
        if ($resultado = $this->conexion->query($sql)){
            while ($row = $resultado->fetch_assoc()) {
                $listaProductos[] = $row;
            }
        } else {
            echo "Error al consultar";
        }
        
        return $listaProductos;
    }
    
      function editar($valor)
    {
        
        $sql = "UPDATE producto SET  descripcion='{$this->descripcion}', precio='{$this->precio}', imagen='{$this->imagen}' WHERE nombre ='$valor'";

        $rs = mysql_query($sql);
        if ($rs= $this->conexion->query($sql)){
            echo "modificacion exitosa";
            }
        else {
            echo "Error al editar";
        }
    }
    
     function borrar($id)
    {
        $sql = "DELETE FROM producto WHERE nombre ='$id'";
        $rs = mysql_query($sql);
        if ($rs= $this->conexion->query($sql)){
            echo "   ELIMINACION exitosa   ";
            }
        else {
            echo "Error al consultar";
        }
    }

     
    function buscarProducto($valor) {    
        $listaProductos = [];
        $sql = "SELECT * FROM producto WHERE nombre like '$valor'";
        
        if ($resultado = $this->conexion->query($sql))
        {
            while ($row = $resultado->fetch_assoc()) {
                $listaProductos[] = $row;
            }
        } else {
            echo "Error al consultar";
        }
        
        return $listaProductos;
    }

    
    
    
} ?>
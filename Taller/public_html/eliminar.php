<!--Autor: Lina Karina Martinez  Código 1122073
         
    Fecha: 22-Abril-2017
    Archivo:editar.php
    Este archivo tiene como funcion buscar un producto por su nombre y luego poder eliminarlo de la base de datos. permite volver al menu inicial.-->


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
        <title>Main Crud</title>
  </head>
    <style>
      body
      {
        background: url(../imagenes/degrad.jpg);
        background-size:100% 100%;
        background-attachment:fixed;
      }

      div.caja_padre 
      {
        width: 100%;
        height: 50px;
        background :#ABEBC6;
        position: relative; 

      }
      
    </style>

    <body>
    <form ACTION ="eliminar.php" METHOD="post" enctype="multipart/form-data">

       
    <div class = "alert alert-warning" role="alert">
      <h1>CRUD GESTIÓN PRODUCTOS</h1>
      
             
    <h3> FORMATO ELIMINAR PRODUCTO  </h3>
   Digite nombre a eliminar    <input type="text" required name="nombreBuscar" value="<?php if (isset($_REQUEST['nombreBuscar'])) echo $_REQUEST['nombreBuscar'] ?>"  placeholder="Nombre">
   <br>
   <br>
   <input type="submit" value="BUSCAR"  class="btn btn-success" role="button" name = "botonBuscar"/>
   <a href = "eliminar.php" class="btn btn-info" ">LIMPIAR</a>
   <br>
   <br>
   <a href = "main.php" class="btn btn-primary" role="button">VOLVER</a>
  <a href = "index.html" class="btn btn-danger" role="button">CERRAR SESIÓN</a>
  
        


</div>
<?php 

  require "Producto.php";
  if(isset($_POST['botonBuscar']))
  {
  $strNombre = $_POST['nombreBuscar'];
  $producto = new Producto();
  $listaProductos= $producto->buscarProducto($strNombre);
  ?>

      <center><h1>Lista de Productos </h1></center>
        <center>
          <table border="4">
            <thead>
              
              </tr>
                
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Precio</th>
                  <th>Imagen</th>
                  <th>Accion</th>
                  
                  
                  
                <tr>
            </thead>
            <tbody>
              
            
           <tr>
            <?php foreach ($listaProductos as $campos) { ?>
            
                <td><?php echo $campos['nombre'] ?></td>
                <td><?php echo $campos['descripcion']?></td>
                 <td><?php echo $campos['precio']?></td>
                 <td><?php echo "<img src='http://localhost/Taller/public_html/almacenarImagenes/". basename($campos['imagen']) ."' />";?></td>
            
                 <td><input type="submit" value="BORRAR"  class="btn btn-danger" role="button" name ="botonBorrar"/></td>

           
      

            </tr>
          </tbody>
          </table>
        </center>
           

            <?php } }

  if(isset($_POST['botonBorrar']))
  {
  $strNombre = $_POST['nombreBuscar'];


        
      $producto = new Producto();
      $producto->borrar($strNombre);

      
    }
?>

</form>
</body>
</html>
    

  
    

 

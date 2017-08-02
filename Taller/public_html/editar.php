<!--Autor: Lina Karina Martinez  Código 1122073
         
    Fecha: 22-Abril-2017
    Archivo:editar.php
    Este archivo tiene como funcion buscar un producto por su nombre y luego poder editar sus campos descripcion, precio  e imagen. permite volver al menu inicial.-->


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

      /*div.caja_padre 
      {
        width: 100%;
        height: 100px;
        background :#ABEBC6;
        position: relative; 

      }*/
      
    </style>

    <body>
<form ACTION ="editar.php" METHOD="post" enctype="multipart/form-data">

 
    <div class = "alert alert-warning" role="alert">
      
    <h3> FORMATO EDICIÓN PRODUCTO  </h3>
   Digite nombre a buscar   <input type="text" required name="nombreBuscar"  value="<?php if (isset($_REQUEST['nombreBuscar'])) echo $_REQUEST['nombreBuscar'] ?>"  >
   <br>
   <br>
  
   <input type="submit" value="BUSCAR"  class="btn btn-danger" role="button" name = "botonBuscar"/>

   <a href = "editar.php" class="btn btn-success" ">LIMPIAR</a>
  
<a href = "main.php" class="btn btn-info" role="button">VOLVER</a>
   <br>
   <br>

 <a href = "index.html" class="btn btn-primary" role="button">CERRAR SESIÓN</a>
<br>
   <br>
   <br>

<p><b>Para editar llene los campos: DESCRIPCION, PRECIO y luego seleccione archivo, por último clic en EDITAR.</b></p>
        
   
    </div>
        <div class="caja_padre">

          
          <div class="col-xs-5  col-sm-6 col-md-2">  
            DESCRIPCIÓN <input type="text" class="form-control"  name="descripcion" placeholder="Descripcion">
          </div>
         <div class="col-xs-5  col-sm-6 col-md-2">  
            PRECIO <input type="text" class="form-control"  name="precio" placeholder="Precio">
          </div>
           <br>
             <br>
             <br>
             <br>
         <div class="col-xs-12 col-sm-6 col-md-4">
            IMAGEN<INPUT TYPE="file" name="imagen"  id="file-url" class="form-control"/>
             </div>
              <br>
             <br>
             <br>
             <br>
         <div class="col-xs-2">
            <input type="submit" value="EDITAR"  class="btn btn-success" role="button" name = "botonAceptar"/>
          </div>
          <br>
          <br>
          <br>
</div>
</div>
</form>

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
                  
                  
                  
                <tr>
            </thead>
            <tbody>
              
            
           <tr>
            <?php foreach ($listaProductos as $campos) { ?>
            
                <td><?php echo $campos['nombre'] ?></td>
                <td><?php echo $campos['descripcion']?></td>
                 <td><?php echo $campos['precio']?></td>
                 <td><?php echo "<img src='http://localhost/Taller/public_html/almacenarImagenes/". basename($campos['imagen']) ."' />";?></td>
            
              

           
      

            </tr>

            <?php } }
    if(isset($_POST['botonAceptar']))
  {
  $strNombre = $_POST['nombreBuscar'];
$strDescripcion = $_POST['descripcion'];
$strPrecio = $_POST['precio'];

$dir_destino =  "almacenarImagenes/";
$imagen_subida = $dir_destino . basename($_FILES['imagen']['name']);

if(!is_writable($dir_destino)){
  echo "no tiene permisos";
}else{
  if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
    
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_subida)) {
        
      $producto = new Producto($strNombre, $strDescripcion, $strPrecio, $imagen_subida);
      $producto->editar($strNombre);

      echo "<img src='http://localhost/Taller/public_html/almacenarImagenes/". basename($imagen_subida) ."' />";
    } else {
      echo "Posible ataque de carga de archivos!\n";
    }
  }else{
    echo "Posible ataque del archivo subido: ";
    echo "nombre del archivo '". $_FILES['archivo_usuario']['tmp_name'] . "'.";
  }
}?>
     </tbody>
          </table>
        </center>
<?php } ?>


  </body>
  </html>
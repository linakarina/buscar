
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

      
      
    </style>

<?php
require "UsuarioUno.php";

session_start();

// Preguntamos si el usuario esta logueado y si es de tipo administrador
if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->tipousuario == "Administrador"))
 { ?>


<body>
<form ACTION ="registrarProducto.php" METHOD="post" enctype="multipart/form-data">
       
    <div class = "alert alert-warning" role="alert">
      <strong><h2>GESTIÓN PRODUCTOS</h2></strong>
        <h4><p><?php echo "Bienvenido ". $_SESSION['usuario']->nombre;?></p></h4>
               <?php echo " Usuario: ".$_SESSION['usuario']->tipousuario;?></p></h4>
               <a href = "editar.php" class="btn btn-danger" role="button">Editar</a>
               <a href = "eliminar.php" class="btn btn-warning" role="button">Eliminar</a>
               <br>
               <br>
                 <a href = "main.php" class="btn btn-info" role="button">LIMPIAR</a>
               <a href = "index.html" class="btn btn-primary" role="button">CERRAR SESIÓN</a>
              

        </div>  
        <div>     
    <h3> FORMATO REGISTRO  </h3>
   
       

          <div class="col-xs-5  col-sm-6 col-md-2">  
           NOMBRE <input type = "text"  class="form-control" required name="nombre" placeholder="Nombre">
          </div>
          
          
          <div class="col-xs-5 col-sm-6 col-md-2">
            DESCRIPCIÓN <input type="text" class="form-control" required name="descripcion" placeholder="Descripcion">
          </div>
          

           <br>
          <br>
          <br>
          <div class="col-xs-5 col-sm-6 col-md-2">
            PRECIO <input type="text" class="form-control" required name="precio" placeholder="Precio">
          </div>
         
         <br>
          <br>
          <br>
          <div class="col-xs-12 col-sm-6 col-md-4">
            IMAGEN<INPUT TYPE="file" required name="imagen"  id="file-url" class="form-control"/>
          </div>
          <br>
          <br>
          <br>
          <div class="col-xs-2">
           <input type="submit" value="Registrar"  class="btn btn-success" role="button" name = "botonRegistrar"/>
          </div>
        </div>
         <br>
          <br>
         
</form>


<?php 

  require "Producto.php";
  $producto = new Producto();
  $listaProductos= $producto->listarProductos();
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
            <?php } ?>
           
            
            </tbody>
          </table>
        </center>


 <?php }


else if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->tipousuario == "Publico")) {
echo "Bienvenido " . $_SESSION['usuario']->nombre." tipo de usuario: ".$_SESSION['usuario']->tipousuario;
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Buscador en Tiempo Real con AJAX</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <!-- ESTILOS -->
    <link href="../css/estilos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    

  </head>
  <body>
  <br>
  <a href = "index.html" class="btn btn-primary" role="button">CERRAR SESIÓN</a>
    <header>
      <div class="alert alert-info">
      <h2>Buscador en Tiempo Real con AJAX</h2>
      </div>
    </header>

    <section>
      <input type="text" name="busqueda" id="busqueda" placeholder="Buscar...">
    </section>

    <section id="tabla_resultado">
    <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
    </section>
    <script src="../js/jquery-3.2.0.js"></script>
    <script src="../js/peticion.js"></script>

  </body>
</html>
<?php }

 else {

    header("Location: index.html");
}
	?> 
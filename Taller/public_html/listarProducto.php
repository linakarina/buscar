<?php
require "Producto.php";



$producto = new Producto();
$listaProductos= $producto->listarProductos();

?>
<html>
<head>
<!--<link rel="stylesheet" type ="text/css" href="estilo1.css"/>-->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<title>Productos</title>
</head>
<body>


<form ACTION ="insertarImagen.php" METHOD="post" enctype="multipart/form-data">
      <h1>Listar Productos </h1>
        <center>
        	<table border="2">
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
                <td><?php echo $campos['nombre'] ?></td><!--aqui debo colocar los campos como estan en la base de datos-->
                <td><?php echo $campos['descripcion']?></td><!--aqui debo colocar los campos como estan en la base de datos-->
                 <td><?php echo $campos['precio']?></td><!--aqui debo colocar los campos como estan en la base de datos-->
             <td><?php echo "<img src='http://localhost/Taller/public_html/almacenarImagenes/". basename($campos['imagen']) ."' />";?></td>
            </tr>
            <?php }?>
            </tbody>
        	</table>
            <a href = "editar.php" class="btn btn-danger" role="button">Editar</a>
           <a href = "eliminar.php" class="btn btn-warning" role="button">Borrar</a>
      
        </center>

</form>


            
            

    </body>
</html>
<?php
require "Imagen.php";

$imagen = new Imagen();
$listaImagen= $imagen->listarImagenes();


?>
<html>
<head>
<!--<link rel="stylesheet" type ="text/css" href="estilo1.css"/>-->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<title>Imagenes</title>
</head>
<body>


<form ACTION ="insertarImagen.php" METHOD="post" enctype="multipart/form-data">
      <h1>Listar imagenes </h1>
        <center>
        	<table border="2">
        		<thead>
        			
        			</tr>
        				<th>Id</th>
            			<th>Nombre</th>
            			<th>Imagen</th>
            			<th>Operaciones</th>
            		<tr>
        		</thead>
        		<tbody>
        			
        		
           <tr>
            <?php foreach ($listaImagen as $campos) { ?>
                <td><?php echo $campos['id'] ?></td><!--aqui debo colocar los campos como estan en la base de datos-->
                <td><?php echo $campos['nombre']?></td><!--aqui debo colocar los campos como estan en la base de datos-->
                <td><img src="data:image/jpg;base64,<?php echo base64_encode($campos['imagen']); ?>"/></td><!--aqui debo colocar los campos como estan en la base de datos-->
                <th><a href="#" title="modificar"><font size="5" color="#FE9A2E" face="arial">Modificar</th></font></a>
                 <th><a href="#" title="eliminar"><font size="5" color="#FE9A2E" face="arial">Eliminar</th></font></a>


            </tr>
            <?php }?>
            </tbody>
        	</table>
        </center>

</form>


            
            

    </body>
</html>
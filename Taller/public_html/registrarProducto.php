<?php
require "Producto.php";
// 1. Leer datos de $_REQUEST o  $_POST
$strNombre = $_POST['nombre'];
$strDescripcion = $_POST['descripcion'];
$strPrecio = $_POST['precio'];

$dir_destino =  "almacenarImagenes/";
$imagen_subida = $dir_destino . basename($_FILES['imagen']['name']);

?>
<!DOCTYPE html>
<!--
Autor: Lina Karina Martínez Romero Código 1122073-2711
fecha: 22/Abril/2017
Archivo index.html pagina principal

-->
<html>
    <head>
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet">-->
      <link rel="stylesheet" type ="text/css" href="estilo1.css"/>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">  
 <title>PANTALLA PRINCIPAL</title>

<?php
if(!is_writable($dir_destino)){
	echo "no tiene permisos";
}else{
	if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
		
		if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_subida)) {
				
			$producto = new Producto($strNombre, $strDescripcion, $strPrecio, $imagen_subida);
			$producto->registrar();

			echo "<img src='http://localhost/Taller/public_html/almacenarImagenes/". basename($imagen_subida) ."' />";

			?>
			<div class = "alert alert-warning" role="alert">
      		
			<a href = "main.php"  class="btn btn-success" role="button">VOLVER</a>
			</div>
			<?php
		} else {
			echo "Posible ataque de carga de archivos!\n";
		}
	}else{
		echo "Posible ataque del archivo subido: ";
		echo "nombre del archivo '". $_FILES['archivo_usuario']['tmp_name'] . "'.";
	}
}
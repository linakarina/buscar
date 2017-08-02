<?php
/////// CONEXIÓN A LA BASE DE DATOS /////////


$conexion = new mysqli('localhost', 'Lina', '12345', 'ejemplodb');
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT * FROM producto ORDER BY nombre";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['listaProductos']))
{
	$q=$conexion->real_escape_string($_POST['listaProductos']);
	$query="SELECT * FROM producto WHERE 
		nombre LIKE '$q%'";
}

$buscarProductos=$conexion->query($query);
if ($buscarProductos->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
		<tr class="bg-primary">
			<td>NOMBRE</td>
			<td>DESCRIPCION</td>
			<td>PRECIO</td>
			
			
		</tr>';

	while($filaProductos= $buscarProductos->fetch_assoc())
	{
		$tabla.=
		'<tr>
			
			<td>'.$filaProductos['nombre'].'</td>
			<td>'.$filaProductos['descripcion'].'</td>
			<td>'.$filaProductos['precio'].'</td>

			
			
		 </tr>';
		
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>

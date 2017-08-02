
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
 <title>LOGUEO</title>
<?php
require "UsuarioUno.php";

// Para iniciar la sesion
session_start();

// Datos de entrada
echo $login = $_POST['login'];
echo $clave = $_POST['clave'];


$user = new UsuarioUno($login, $clave);
if ($user->isValid()) {
    // cargar datos
    $_SESSION['usuario'] = $user;
    header("Location: main.php");
    
} else {

     ?> 
    <div class = "alert alert-warning" role="alert">
    <a href = "logueo.php"  class="btn btn-success" role="button">VOLVER</a>
			</div>Error datos incorrectos!!<br>";
    

    <?php
    
}?>







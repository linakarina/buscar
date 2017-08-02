<?php
require "Usuario.php";
// 1. Leer datos de $_REQUEST o  $_POST
$strNombre = $_POST['nombre'];
$strlogin = $_POST['login'];
$strClave = $_POST['clave'];


$strtipousuario = $_POST['tipousuario'];



$user = new Usuario($strNombre,$strlogin, $strClave,$strtipousuario);
$user->registrarUsuario();

?>
<br>
<a href = "logueo.php" class="btn btn-primary" role="button">LOGUEARSE</a>


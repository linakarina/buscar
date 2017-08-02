<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <title>FORMULARIO LOGIN</title>
        <link rel="stylesheet" type ="text/css" href="estilo.css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
       
    </head>
    <body>
        <form action="validar.php" method="POST">
            <h2>Formulario de login </h2>
            <input type="text"   placeholder="&#128272  Login" required name="login" />
            <input type="password"   placeholder="&#128272 Clave" required name="clave" />
            <input type="submit" value="Ingresar" />

            <h3>¿No tienes una cuenta?</h3>
            <center>
            <a href="registrar1.php" title="registrar"><font size="5" color="#FE9A2E" face="arial"> Regístrate ahora</font></a></center>
              
             <a href = "logueo.php" class="btn btn-info" role="button">LIMPIAR</a>
             <br>
             <br>   
            
            <a href = "index.html" class="btn btn-primary" role="button">SALIR</a>
              
        </form>
        
            
                
      
    </body>
</html>

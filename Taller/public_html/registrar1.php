
<html>
    <head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="stylesheet" type ="text/css" href="estilos.css"/>-->
    </head>
    <style>
        {
   margin: 0;
   padding: 0;
   font-family: "Arial Rounded MT Bold";
   box-sizing: border-box;
}


body{
   background: url(../imagenes/degrad.jpg);
    background-size:100% 100%;
    background-attachment:fixed;
    display: flex;
    min-height: 100vh;
}

form{
    margin: auto;
    width: 50%;
    max-width: 500px;
    background: #0B3861;
    padding: 30px;
    border: 1px solid rgba(0,0,0,0.2);
}

h2{
    text-align: center;
    margin-bottom: 20px;
    color:#FE642E;
    
}

h3{
    text-align: left;
    margin-bottom: 20px;
    color:white;
}


input{
    display: block;
    padding: 10px;
    width: 100%;
    margin:30px 0;
    font-size: 15px;
}

@media (max-withd: 768px){
    form{
        width: 75%;
    }

}

@media (max-withd: 480px){
    form{
        width: 95%;
    }
    }
}
    </style>
    
    <body> 
    <!-- funcion para validar que el usuario eligio un tipo de usuario-->
     <script type="text/javascript">
        function validarSeleccion() {
        var combo1 = document.getElementById("tipousuario")
        if(combo1.value == "TiposUsuarios") {
        alert("Por favor, seleccione un tipo de Usuario: Administrador o Público");
        document.getElementById("sel").style.border = "2px solid red";
        return false;
        }
         else {
        document.getElementById("sel").style.border = "";
        }
      }
    </script>

    <form action="registrar.php" method="POST" onsubmit="return validarSeleccion()">
      <span id="sel">
      <h2>Formulario de Registro Usuario </h2>
        <h3>Ingresa tu nombre</h3><center>
            <input type="text" placeholder="Nombre"  REQUIRED name="nombre" />
           
        <h3>Ingresa tu login</h3><center>
            <input type="text" placeholder="Login"  required name="login" />

        <h3>Ingresa tu clave</h3><center>
            <input type="password" placeholder="Clave"  required name="clave" />

        <h3>Elige tipo de usuario</h3><center>
        
        <div class="col-xs-6">

        <select class="form-control"  name="tipousuario" id="tipousuario">
        <option  value="TiposUsuarios">Tipos de Usuarios</option>
        <option  value="Administrador">Administrador</option>
        <option  value="Publico">Publico</option>
        </select>

        </div>
      
        <button type="submit" class="btn btn-warning btn-lg" name="registrar">REGISTRARSE</button>
        <br>
        <br>
        <p>
        <a href = "logueo.php" class="btn btn-primary" role="button">LOGUEARSE</a>
        <a href = "index.html" class="btn btn-default" role="button">SALIR</a>
        
</p>

    </form>
    </form>
        
        
      
   </body>
</html>
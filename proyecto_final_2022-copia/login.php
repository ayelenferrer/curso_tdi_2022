<?php

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Inicio de sesión</title>
    <!-- CORE CSS-->
    <link href="css//materialize.css" type="text/css" rel="stylesheet">
    <link href="css//style.css" type="text/css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <link rel="icon" href="imágenes/r.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;600&display=swap" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="css/custom/custom.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
  </head>

  <body>
<div class="tLogin">
    <h1 class="center-align">Iniciar sesión</h1>
</div>

<div class="">
    <form method="$_POST" action="administradores.php" class="col s12 formL">
        <div class="row">
            <div class="input-field col s12 m6 offset-m3">
                <label for="first_name">Nombre</label>
                <input id="first_name" type="text" class="validate" name="nombre">
                
            </div>
        
        </div>

            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <label for="last_name">Clave</label>
                    <input id="last_name" type="password" class="validate" name="clave">
                    
                </div>
            </div>
            <input type="hidden" name="accion" value="ingresar">
            <button class="btn waves-effect waves-ligth center-align" type="submit">
                <i class="material-icons right">Ingresar</i>
            </button>
    </form>
</div>
        
            
            </div>

        
    </form>
</div>

    </body>

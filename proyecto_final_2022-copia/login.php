<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Inicio - Panel Administrator</title>
    <!-- Favicons-->
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="css//materialize.css" type="text/css" rel="stylesheet">
    <link href="css//style.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="css/custom/custom.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
 
  </head>
  <body>
<div class="navbar-fixed">
        <nav class="purple lighten-2">
          <div class="nav-wrapper">
            <ul class="left">
              <li>
                <h1 class="logo-wrapper">
                  <a href="index.html" class="brand-logo darken-1">
                    <a class="brand-logo">Rachel Beauty</a>
                  </a>
                </h1>
              </li>
            </ul>

<div>
    <h1 class="center-align">Login</h1>
</div>

<div>
    <form method="$_POST" action="administradores.php" class="col s12">
        <div class="row">
            <div class="input-field col s12 m6 offset-m3">
                <input id="first_name" type="text" class="validate" name="nombre">
                <label for="first_name">Nombre</label>
            </div>
        
        </div>

            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <input id="last_name" type="password" class="validate" name="clave">
                    <label for="last_name">Clave</label>
                </div>
            </div>
            <input type="hidden" name="accion" value="ingresar">
            <button class="btn waves-effect waves-ligth center-align" type="submit">Ingresar
                <i class="material-icons right">send</i>
            </button>
    </form>
</div>
        
            
            </div>

        
    </form>
</div>

    </body>

<!DOCTYPE html>
  <html>
        <head>
            <!--Import Google Icon Font-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
             <!--Import materialize.css-->
            <link type="text/css" rel="stylesheet" href="backend/web/materialize/css/materialize.css"  media="screen,projection"/>
            


            <!--Let browser know website is optimized for mobile-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        </head>

        <body>

        <!-- Menú del botón -->
            <ul id="dropdown1" class="dropdown-content">
                <li><a href="#!">Perfil</a></li>
                <li><a href="#!">Inicio</a></li>
                <li class="divider"></li>
                <li><a href="#!">Cerrar sesión</a></li>
            </ul>
            <nav class="white">
                <div class="white">
                    <a href="panelAdmin.php" class="brand-logo black-text marca" style="font-size: 1.7em; margin-left: 1em;">RACHEL BEAUTY</a>
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <a href="sass.html" class="black-text">Inicio</a>
                        </li>
                        <li>
                            <a href="badges.html" class="black-text">Productos</a>
                        </li>
                        <li>
                            <a href="sass.html" class="black-text">Contacto</a>
                        </li>
                        
      <!-- Dropdown Trigger -->
                        <li> 
                            <a href="./carrito.php">
                                <i class='small material-icons black-text'>add_shopping_cart</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        
            

            <!--JavaScript at end of body for optimized loading-->
            <script type="text/javascript" src="web/materialize/js/materialize.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    M.AutoInit();
                });

            </script>
        </body>
  </html>
        
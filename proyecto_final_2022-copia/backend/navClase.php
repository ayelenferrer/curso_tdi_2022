<!DOCTYPE html>
  <html>
        <head>
            <!--Import Google Icon Font-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
             <!--Import materialize.css-->
            <link type="text/css" rel="stylesheet" href="web/materialize/css/materialize.css"  media="screen,projection"/>

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
            <nav class="pink lighten-4">
                <div class="pink lighten-4">
                    <a href="#" class="brand-logo">Rachel Beauty</a>
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <a href="sass.html">Usuarios</a>
                        </li>
                        <li>
                            <a href="badges.html">Ventas</a>
                        </li>
                        <li>
                            <a href="sass.html">Productos</a>
                        </li>
                        <li>
                            <a href="sass.html">Categorias</a>
                        </li>
      <!-- Dropdown Trigger -->
                        <li>
                            <a class="dropdown-trigger" href="#!" data-target="dropdown1">
                                <i class="material-icons right">settings</i>
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
        
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../backend/web/css/materialize.css" media="screen,projection" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;600&amp;display=swap" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--Para que quede abajo el footer-->
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        tarjeta {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        tf {
            font-family: Montserrat;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="nav-wrapper blue darken-4">
                <div class="container">
                    <a href="index.php?r=inicio" class="brand-logo">
                        <img src="./img/logo2.png">
                    </a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="index.php?r=inicio">Inicio</a></li>
                        <li><a href="index.php?r=servicios">Servicios</a></li>
                        <li><a href="index.php?r=contacto">Contacto</a></li>
                        <li><a href="index.php?r=rastrear">Rastrear</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <br>
    <main>
        <div class="container">
            <?PHP include("router.php"); ?>
        </div>
        <footer class="page-footer blue darken-4">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Encontranos en:</h5>
                        <i class='bx-fw bx bxl-facebook-square' type='logo' color='#ffffff'></i>
                        <i class='bx-fw bx bxl-instagram' type='logo' color='#ffffff'></i>
                        <i class='bx-fw bx bxl-linkedin-square' type='logo' color='#ffffff'></i>
                        <i class='bx-fw bx bxl-youtube' type='logo' color='#ffffff'></i>
                        <br>
                        <div class="footer-copyright">
                            2022 © - todos los derechos reservados
                        </div>

                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">AFI</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">Tel: 2022</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Dir: Blvd 2604, Montevideo</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Mail: AFI@correo.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </footer>
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="../backend/web/js/materialize.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                M.AutoInit();
            });
        </script>
        <!--JavaScript del Carousel-->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.carousel');
                var instances = M.Carousel.init(elems, {
                    duration: 200,
                    indicators: true
                });
            });
        </script>
        <!--JavaScript del boton flotante-->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.fixed-action-btn');
                var instances = M.FloatingActionButton.init(elems);
            });
        </script>
</body>

</html>
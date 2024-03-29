<!DOCTYPE html>
<html class="loading">

<head>
    <title>Menú</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="web/css/materialize.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="web/css/style.css" media="screen,projection" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/font/material-design-icons/Material-Design-Icons.woff" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
    <style>
        .space {
            height: 50px;
        }
    </style>
</head>

<body>
    <!--Barra lateral-->
    <ul id="slide-out" class="side-nav fixed z-depth-2">
        <li class="center no-padding">
            <div class="indigo darken-2 white-text" style="height: 180px;">
                <div class="row">
                    <img style="margin-top: 5%;" width="100" height="100" src="../backend/web/img/logo.png" class="circle responsive-img" />
                </div>
            </div>
        </li>

        <li id="dash_dashboard"><a class="waves-effect" href="sistema.php?r=menu"><b>Menú</b></a></li>

        <ul class="collapsible" data-collapsible="accordion">
            <?php
                @session_start();
                if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'recepcionista') {
            ?>
            <li id="dash_users">
                <div id="dash_users_header"> <a href="sistema.php?r=clientes" class="collapsible-header waves-effect"><b>Clientes</b></a></div>
            </li>
            <?php
                }
            ?>
            <?php
                if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'admin') {
            ?>
            <li id="dash_products">
                <div id="dash_products_header"> <a href="sistema.php?r=empleados" class="collapsible-header waves-effect"><b>Empleados</b></a></div>
            </li>
            <?php
                }
            ?>
            <?php
                if (isset($_SESSION['tipo']) && ($_SESSION['tipo'] != 'admin')) {
            ?>
            <li id="dash_categories">
                <div id="dash_categories_header"><a href="sistema.php?r=envios" class="collapsible-header waves-effect"><b>Envios</b></a></div>
            </li>
            <?php
                }
            ?>
        </ul>
    </ul>

    <header>
        <!--Nav/icono-->
        <ul class="dropdown-content" id="user_dropdown">
            <li><a class="indigo-text" href="logout.php">Salir</a></li>
        </ul>

        <nav class="indigo" role="navigation">
            <div class="nav-wrapper">
                <a data-activates="slide-out" class="button-collapse show-on-" href="#!"><img style="margin-top: 17px; margin-left: 5px;" src="https://res.cloudinary.com/dacg0wegv/image/upload/t_media_lib_thumb/v1463989873/smaller-main-logo_3_bm40iv.gif" /></a>

                <ul class="right hide-on-med-and-down">
                    <li>
                        <a class='right dropdown-button' href='' data-activates='user_dropdown'><i class=' material-icons'>account_circle</i></a>
                    </li>
                </ul>

                <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </nav>
    </header>
    </br>
    </br>
    <div class="container">
        <?PHP include("../backend/router.php"); ?>
    </div>
    <footer>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        
    </footer>
</body>

</html>
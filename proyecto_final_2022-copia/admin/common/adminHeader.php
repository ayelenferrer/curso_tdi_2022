<?php 
?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>Inicio - Panel Administrator</title>
  <!-- Favicons-->
  <link rel="icon" href="/proyecto_final_2022-copia/plantilla_adminMaterialize/images/r.png">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->
  <!-- CORE CSS-->
  <link href="../css//materialize.css" type="text/css" rel="stylesheet">
  <link href="../css//style.css" type="text/css" rel="stylesheet">
  <!-- Custome CSS-->
  <link href="../css/custom/custom.css" type="text/css" rel="stylesheet">
  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
  <link rel="icon" href="imágenes/r.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;600&display=swap" rel="stylesheet">

  <style>
    .font {
      font-family: 'Montserrat';
      font-size: medium;
    }
  </style>

</head>
<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->
<!-- START HEADER -->
<header id="header" class="page-topbar">
    <!-- start header nav / -->
    <div class="navbar-fixed">
      <nav class="purple lighten-2">
        <div class="nav-wrapper">
          <ul class="left">
            <li>
              <h1 class="logo-wrapper">
                <a class="brand-logo darken-1">
                  <a class="brand-logo font" href="../usuarios/administradores.php" >Rachel Beauty</a>
                </a>
              </h1>
            </li>
          </ul>
          <ul class="right hide-on-med-and-down">
            <!-- Pantalla completa - nav -->
            <li>
              <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
                <i class="material-icons">settings_overscan</i>
              </a>
            </li>
            <!-- Perfil - nav -->
            <li>
              <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                <i class="medium material-icons">account_circle</i>
                <span class="avatar-status avatar-online">
                </span>
              </a>
            </li>
          </ul>


          <!-- profile-dropdown / Menú del perfil en el nav -->
          <ul id="profile-dropdown" class="dropdown-content">
            <li>
              <a href="../usuarios/tablaUsuarios.php" class="grey-text text-darken-1">
                <i class="material-icons">face</i>Usuarios</a>
            </li>
            <li>
              <a href="../administradores.php" class="grey-text text-darken-1">
                <i class="material-icons">settings</i>Panel</a>
            </li>
            <li>
              <a href="../../cliente/usuario/logout.php" class="grey-text text-darken-1">
                <i class="material-icons">keyboard_tab</i>Salir</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <!-- end header nav-->
  </header>
  <!-- END HEADER -->
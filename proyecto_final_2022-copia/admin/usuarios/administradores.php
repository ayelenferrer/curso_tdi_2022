<!DOCTYPE html>
<html lang="en">

<head>
  <title>Inicio - Panel Administrator</title>
</head>

<body>
  
  <!-- //////////////////////////////////////////////////////////////////////////// -->
 
  <?php include '../common/adminHeader.php';?>

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
     
    <?php include '../common/slideNav.php';?>

      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <!-- START CONTENT -->
      <section id="content">
        <!--start container-->
        <div class="container">
          <!--card stats start-->
          <div id="card-stats">
            <div class="row mt-1">
              <div class="col s12 m6 l3">
                <div class="card purple lighten-3 gradient-shadow min-height-100 white-text">
                  <div class="padding-4">
                    <div class="col s7 m7">
                      <i class="material-icons background-round mt-5">shopping_cart</i>
                      <p>Gestión de ventas</p>
                    </div>
                    <div class="card-action">
                      <a href="../pedidos/tablaPedidos.php" class="waves-effect waves-light btn gradient-45deg-purple-pink">Ver</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col s12 m6 l3">
                <div class="card purple lighten-3 gradient-shadow min-height-100 white-text">
                  <div class="padding-4">
                    <div class="col s7 m7">
                    <i class="material-icons background-round mt-5">face</i>
                      <p>Gestión de usuarios</p>
                    </div>
                    <div class="card-action">
                      <a href="../usuarios/tablaUsuarios.php" class="waves-effect waves-light btn gradient-45deg-purple-pink">Ver</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col s12 m6 l3">
                <div class="card purple lighten-3 gradient-shadow min-height-100 white-text">
                  <div class="padding-4">
                    <div class="col s7 m7">
                      <i class="material-icons background-round mt-5">apps</i>
                      <p>Gestión de productos</p>
                    </div>
                    <div class="card-action">
                      <a href="../productos/tablaProductos.php" class="waves-effect waves-light btn gradient-45deg-purple-pink">Ver</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col s12 m6 l3">
                <div class="card purple lighten-3 gradient-shadow min-height-100 white-text">
                  <div class="padding-4">
                    <div class="col s7 m7">
                      <i class="material-icons background-round mt-5">storage</i>
                      <p>Categorías</p>
                    </div>
                    <div class="card-action">
                      <a href="../categorias/tablaCategorias.php" class="waves-effect waves-light btn gradient-45deg-purple-pink">Ver</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php include '../common/scriptsAdmin.php';?>
</body>
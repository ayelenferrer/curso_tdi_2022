<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Productos</title>

    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <link rel="icon" href="imágenes/r.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;600&display=swap" rel="stylesheet">


</head>
<header>
    <div class="logo">
        <a href="#" class="marca">RACHEL BEAUTY</a>
    </div>
    <nav>
        <ul class="nav">
            <li class="links"><a href="inicio.html">Inicio</a></li>
            <li class="links"><a href="productos.php">Productos</a></li>
            <li class="links"><a href="contacto.html">Contacto</a></li>
            <?php
            
            if (isset($_SESSION['email'])) {
            ?>
                <li class="links"><a href="logout.php">Logout</a></li>
            <?php }
            ?>
            <?php
            if (!isset($_SESSION['email'])) {
            ?>
                <li class="links"><a href="login.php">Login</a></li>
            <?php }
            ?>
            <li class="links"><a href="carrito.php"> <i class='bx bxs-cart-add contactoIcon'></i></a></li>
            <?php
            if (isset($_SESSION['email']))
                echo $_SESSION['email'];
            ?>



        </ul>
    </nav>

    <!--FIN - Barra de navegación>

                 <!-Section-->

</header>
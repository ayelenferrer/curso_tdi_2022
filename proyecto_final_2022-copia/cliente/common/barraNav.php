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
    <link href="../estilos/styles.css" rel="stylesheet">
    <link rel="icon" href="imágenes/r.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;600&display=swap" rel="stylesheet">


</head>
<header>
    <div class="logo">
        <a href="../inicio.php" class="marca">RACHEL BEAUTY</a>
    </div>
    <nav>
        <ul class="nav">
            <li class="links"><a href="../usuario/inicio.php">Inicio</a></li>
            <li class="links"><a href="../productos/productos.php">Productos</a></li>
            <li class="links"><a href="../usuario/contacto.php">Contacto</a></li>
            <?php
            
            if (isset($_SESSION['email'])) {
            ?>
                <li class="links"><a href="../carrito/carrito.php"> <i class='bx bxs-cart-add contactoIcon'></i></a></li>
                <li class="links"><a href="../usuario/logout.php">Logout</a></li>
            <?php }
            ?>
            <?php
            if (!isset($_SESSION['email'])) {
            ?>
                <li class="links"><a href="../usuario/login.php">Login</a></li>
            <?php }
            ?>
            <?php
            if (isset($_SESSION['email']))
                echo '<li class="links"><a href="#">',$_SESSION['email'],'</a></li>';
            ?>



        </ul>
    </nav>

</header>
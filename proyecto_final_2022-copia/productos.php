<?php 

include "config.php";

$sql = "SELECT * FROM producto";

$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./pruebasCarrito/carrito.js" type="text/javascript"> </script>
    <link rel="icon" href="imágenes/r.png">
    <link type="text/css" rel="stylesheet" href="styles.css"/>
    <title>Productos</title>

    
</head>

<body>
    
<?php include 'barraNav.php';?>
       
    
    
        

                <!-- Catálogo -->
            <section>
            <?php

                if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

            ?>

                <!-- Tarjeta 1 -->
                <div class="cuerpo-tarjeta">
                    <div class="foto-producto">
                        <img class="img" src="imágenes/<?php echo $row['foto']; ?>" alt="Crema Línea Coco">
                    </div>
                    <div class="descripcion">
                        <b><?php echo $row['nombre']; ?></b><br>
                        <?php echo $row['descripcion']; ?><br>
                        <?php echo $row['precio']; ?><br>
                        <input type="number" id="cantidad<?php echo $row['id']; ?>">
                        <?php 
                        if (isset($_SESSION['email'])){
                            ?>

                        
                        <a class="boton-comprar" href="#" id="boton<?php echo $row['id']; ?>" onclick="agregarCarrito(<?php echo $row['id']; ?>,'<?php echo $row['nombre']; ?>',<?php echo $row['precio']; ?>,'<?php echo $row['foto']; ?>','<?php echo $row['descripcion']; ?>')">Comprar</a>
                        <?php }
                        ?>
                    </div>
                </div>

                <?php       }

                }

                ?> 


            </section>      
                                         <!-- Fin del Catálogo-->
        </div>

        <?php include 'footer.php';?>

    
</body>
</html>
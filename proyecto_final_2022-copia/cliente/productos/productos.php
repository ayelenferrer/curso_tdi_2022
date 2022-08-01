<?php

include "../config.php";
require '../carrito/funciones.php';

if(isset($_GET['idcategoria']) && is_numeric($_GET['idcategoria'])){
    $idcategoria = $_GET['idcategoria'];
    $sql = "SELECT * FROM producto WHERE producto.idcategoria = $idcategoria";

}
elseif(isset($_GET['search'])){
    $search = $_GET['search'];
    $sql = "SELECT * FROM producto WHERE producto.nombre LIKE '%$search%'";
}
else{
    $sql = "SELECT * FROM producto";
}



$result = $conn->query($sql);

$sql2 = "SELECT * FROM categoria";

$categorias = $conn->query($sql2);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../carrito/carrito.js" type="text/javascript"> </script>
    <link rel="icon" href="../imágenes/r.png">
    <title>Productos</title>
    <style>
        #search {
            background: url(https://cdn0.iconfinder.com/data/icons/slim-square-icons-basics/100/basics-19-32.png) no-repeat 0px 5px;
            background-size: 24px;
            width: 500px !important;
            border: transparent;
            border-bottom: solid 1px #ccc;
            padding: 10px 10px 10px 30px;
            outline: none;
            margin-left: 50px;
            width: 37%;
        }

        .custom-select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            height: 40px;
            padding: 10px 38px 10px 16px;
            background: #fff url("select-arrows.svg") no-repeat right 16px center;
            background-size: 10px;
            transition: border-color .1s ease-in-out, box-shadow .1s ease-in-out;
            border: 1px solid #ddd;
            border-radius: 3px;
            margin-right: 40px;
        }

        .custom-select:hover {
            border: 1px solid #999;
        }

        .custom-select:focus {
            border: 1px solid #999;
            box-shadow: 0 3px 5px 0 rgba(0, 0, 0, .2);
            outline: none;
        }

        /* remove default arrow in IE */
        select::-ms-expand {
            display: none;
        }

        /* DEMO STYLING */
        .custom-select {
            font-family: "Source Sans Pro", sans-serif;
            font-size: 15px;
        }

        .padreSelect {
            display: flex;
            justify-content: space-between;

        }
    </style>
    <script>
        function refresh(event){
            
            var selectedValue = document.getElementById("select").value;
            console.log(selectedValue)
            window.location.href = "../productos/productos.php?idcategoria=" + selectedValue
        }
    </script>
</head>

<body>

    <?php include '../common/barraNav.php'; ?>





    <!-- Catálogo -->
    <div class="padreSelect">
       <form action="../productos/productos.php" method="get"><input type="search" placeholder="Buscar" id="search" name="search" /></form>
        <select class="custom-select" onchange="refresh(event)" id="select">
        <option>Seleccione un valor</option>
            <?php

            if ($categorias->num_rows > 0) {

                while ($row = $categorias->fetch_assoc()) {

            ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
            <?php }
            }
            ?>

        </select>
    </div>
    <section>
        <?php

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

        ?>

                <!-- Tarjeta 1 -->
                <div class="cuerpo-tarjeta">
                    <div class="foto-producto">
                        <img class="img" src="../imágenes/<?php echo $row['foto']; ?>" alt="Crema Línea Coco">
                    </div>
                    <div class="descripcion">
                        <b><?php echo $row['nombre']; ?></b><br>
                        <?php echo $row['descripcion']; ?><br>
                        <?php echo $row['precio']; ?><br>
                        <?php

                        if (isset($_SESSION['email']) && !productoEnCarrito($row['id'])) {
                        ?>

                            <input type="number" id="cantidad<?php echo $row['id']; ?>">
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

    <?php include '../common/footer.php'; ?>


</body>

</html>
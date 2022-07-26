<?php

include "../config.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql3 = "SELECT * FROM pedido JOIN usuarios ON id_cliente = usuarios.id WHERE pedido.id = $id";
    $datospedido = $conn->query($sql3);
    if (mysqli_num_rows($datospedido) === 1) {

        $pedido = mysqli_fetch_assoc($datospedido);
    }
    $sql = "SELECT * FROM pedido_producto JOIN producto ON id_producto = producto.id WHERE id_pedido = $id";

    $productos = $conn->query($sql);

    $sql2 = "SELECT SUM(pedido_producto.total) AS total FROM pedido JOIN pedido_producto ON id_pedido = pedido.id WHERE pedido.id = $id";

    $result2 = $conn->query($sql2);
    if (mysqli_num_rows($result2) === 1) {

        $row2 = mysqli_fetch_assoc($result2);
        $total = $row2['total'];
        if (!is_numeric($total)) {
            $total = 0;
        }
    } else {
        $total = 0;
    }
}






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="pedidos.css" rel="stylesheet">
    <title>Detalles pedido</title>
    <style>
        .subtitulos{
            color: #9F3AD5;

        }
    </style>
</head>

<body>

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <?php include 'adminHeader.php'; ?>

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <?php include 'slideNav.php'; ?>

            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <!-- START CONTENT -->
            <section id="content">
                <!-- Modal Trigger -->


                <!-- Modal Structure -->

                <!--start container-->
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            <div class="col s12 m7">
                                <h3 class="header">Pedido #<?php echo $id; ?></h3>
                                <div class="card horizontal">

                                    <div class="card-stacked">
                                        <div class="card-content">
                                            <h5><span class="subtitulos">Fecha:</span> <?php echo $pedido['fecha']; ?></h5>
                                            <h5><span class="subtitulos">Nombre:</span> <?php echo $pedido['nombre']; ?></h5>
                                            <h5><span class="subtitulos">Apellido:</span> <?php echo $pedido['apellido']; ?></h5>
                                            <h5><span class="subtitulos">Total:</span> $ <?php echo $total; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="bordered responsive-table highlight">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    if ($productos->num_rows > 0) {

                                        while ($row = $productos->fetch_assoc()) {

                                    ?>
                                            <tr>
                                                <td><?php echo $row['nombre']; ?></td>
                                                <td><?php echo $row['cantidad']; ?></td>
                                                <td>$ <?php echo $row['precio']; ?></td>
                                                <td>$ <?php echo $row['total']; ?></td>
                                            </tr>

                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </section>

        </div>

        <?php include 'scriptsAdmin.php'; ?>
</body>
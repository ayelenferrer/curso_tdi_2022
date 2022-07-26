<?php

include "../config.php";

$sql = "SELECT pedido.*, usuarios.email FROM pedido JOIN usuarios ON id_cliente = usuarios.id";

$pedidos = $conn->query($sql);



?>

<!DOCTYPE html>
<html lang="en">

<head>
<link href="pedidos.css" rel="stylesheet">   
<title>Gestión de ventas</title>
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
                            <table class="bordered responsive-table highlight">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Cliente</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    if ($pedidos->num_rows > 0) {

                                        while ($row = $pedidos->fetch_assoc()) {
                                            $idpedido = $row['id'];
                                            $sql = "SELECT SUM(pedido_producto.total) AS total FROM pedido JOIN pedido_producto ON id_pedido = pedido.id WHERE pedido.id = $idpedido";

                                            $result2 = $conn->query($sql);
                                            if (mysqli_num_rows($result2) === 1) {

                                                $row2 = mysqli_fetch_assoc($result2);
                                                $total = $row2['total'];
                                                if (!is_numeric($total)) {
                                                    $total = 0;
                                                }
                                            } else {
                                                $total = 0;
                                            }
                                    ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['fecha']; ?></td>
                                                <td>$ <?php echo $total; ?></td>
                                                <td><a class="waves-effect waves-light btn modal-trigger" href="detallesPedido.php?id=<?php echo $row['id']; ?>">Detalles</a></td>
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
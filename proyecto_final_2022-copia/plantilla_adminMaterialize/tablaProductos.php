<?php

include "../config.php";

$sql = "SELECT * FROM producto";

$productos = $conn->query($sql);



?>

<!DOCTYPE html>
<html lang="en">

<head>
<link href="pedidos.css" rel="stylesheet">   
<title>Tabla productos</title>
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
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Descripción</th>
                                        <th>Foto</th>
                                        <th>Acciones</th>
                                        <th><a  href="crearProducto.php" class="waves-effect waves-light btn">Crear</a></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    if ($productos->num_rows > 0) {

                                        while ($row = $productos->fetch_assoc()) {
                                            
                                    ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['nombre']; ?></td>
                                                <td><?php echo $row['precio']; ?></td>
                                                <td><?php echo $row['descripcion']; ?></td>
                                                <td><?php echo $row['foto']; ?></td>
                                                <td><a class="waves-effect waves-light btn modal-trigger" href="borrarProducto.php?id=<?php echo $row['id']; ?>">Borrar</a></td>

                                                
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
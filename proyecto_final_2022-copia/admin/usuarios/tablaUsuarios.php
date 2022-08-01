<?php

include "../../cliente/config.php";

$sql = "SELECT * FROM usuarios WHERE estado = 1";

$usuarios = $conn->query($sql);



?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Gestión de usuarios</title>
</head>

<body>

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <?php include '../common/adminHeader.php'; ?>

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <?php include '../common/slideNav.php'; ?>

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
                                        <th>Apellido</th>
                                        <th>Correo</th>
                                        <th>Documento</th>
                                        <th>Teléfono</th>
                                        <th>Acciones</th>
                                        <th><a  href="formularioAdmin.php" class="waves-effect waves-light btn">Crear</a></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    if ($usuarios->num_rows > 0) {

                                        while ($row = $usuarios->fetch_assoc()) {
                                            
                                    ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['nombre']; ?></td>
                                                <td><?php echo $row['apellido']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['documento']; ?></td>
                                                <td><?php echo $row['telefono']; ?></td>
                                                <td><a class="waves-effect waves-light btn modal-trigger" href="borrarUsuario.php?id=<?php echo $row['id']; ?>">Borrar</a></td>
                                                
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

        <?php include '../common/scriptsAdmin.php'; ?>
</body>
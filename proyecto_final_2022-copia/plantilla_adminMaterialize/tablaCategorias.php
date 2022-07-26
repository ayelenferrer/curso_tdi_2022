<?php

include "../config.php";

$sql = "SELECT * FROM categoria";

$categorias = $conn->query($sql);

if (isset($_POST['submit'])) {

    $nombre = $_POST['nombre'];

    $sql = "INSERT INTO categoria(nombre) VALUES ('$nombre')";

    $result = $conn->query($sql);

    header("Location: tablaCategorias.php");
        
    $conn->close();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="pedidos.css" rel="stylesheet">
    <title>Categorías</title>
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
                            <div class="row">
                                <br>
                                <form class="col s12" action="" method="POST">
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input placeholder="Nombre" id="nombre" type="text" class="validate" name="nombre">
                                            <label for="first_name">Nombre</label>
                                            <input type="submit" name="submit" value="Crear" class="waves-effect waves-light btn">
                                        </div>
                                    </div>
                                </form>
                            </div>
            <br>
                            <table class="bordered responsive-table highlight">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    if ($categorias->num_rows > 0) {

                                        while ($row = $categorias->fetch_assoc()) {

                                    ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['nombre']; ?></td>
                                                <td><a class="waves-effect waves-light btn modal-trigger" href="borrarCat.php?id=<?php echo $row['id']; ?>">Borrar</a></td>

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
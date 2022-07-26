<?php

include "../config.php";

$sql = "SELECT * FROM usuarios";

$usuarios = $conn->query($sql);



if (isset($_POST['submit'])) {

    $nombre = $_POST['nombre'];

    $apellido = $_POST['apellido'];

    $email = $_POST['email'];

    $documento = $_POST['documento'];

    $telefono = $_POST['telefono'];

    $clave = $_POST['clave'];

    $sql = "INSERT INTO usuarios(nombre, apellido, email, documento, telefono, clave, estado) VALUES ('$nombre','$apellido','$email','$documento','$telefono','$clave', 1)";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "Cuenta creada correctamente.";
    } else {

        echo "Error:" . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="pedidos.css" rel="stylesheet">
    <title>Formulario Administradores</title>
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
                    <form action="" method="POST">
                        <fieldset>
                            <ul class="form-style-1">
                                <li>
                                    <label>Nombre<span class="required"></span></label>
                                    <input type="text" name="nombre" class="field-long" />
                                </li>

                                <li>
                                    <label>Apellido<span class="required"></span></label>
                                    <input type="text" name="apellido" class="field-long" />
                                </li>

                                <li>
                                    <label>Email<span class="required"></span></label>
                                    <input type="text" name="email" class="field-long" />
                                </li>
                                <li>
                                    <label>Documento<span class="required"></span></label>
                                    <input type="text" name="documento" class="field-long" />
                                </li>
                                <li>
                                    <label>Teléfono<span class="required"></span></label>
                                    <input type="number" name="telefono" class="field-long" />
                                </li>
                                <li>
                                    <label>Clave<span class="required"></span></label>
                                    <input type="password" name="clave" class="field-long" />
                                </li>

                                <li>
                                    <input class="waves-effect waves-light btn" type="submit" name="submit" value="Enviar">
                                </li>

                            </ul>
                        </fieldset>
                    </form>
                </div>

            </section>

        </div>

        <?php include 'scriptsAdmin.php'; ?>
</body>
<?php

include "../router.php";

$sql = "SELECT * FROM clientes";

$clientes = $conn->query($sql);



if (isset($_POST['submit'])) {

    $nombre = $_POST['nombres'];

    $apellido = $_POST['apellidos'];

    $documento = $_POST['documento'];

    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO usuarios(nombres, apellidos, documento, telefono) VALUES ('$nombres','$apellidos','$documento','$telefono')";

    $result = $conn->query($sql);

    $conn->close();
    
    header("Location: recepcionistas.php");

}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrar Cliente</title>
</head>

<body>
            <!-- START CONTENT -->
            <section id="content">
                <!--start container-->
                <div class="container">
                    <form action="" method="POST">
                        <fieldset>
                            <ul class="form-style-1">
                                <li>
                                    <label>Nombres<span class="required"></span></label>
                                    <input type="text" name="nombre" class="field-long" />
                                </li>

                                <li>
                                    <label>Apellidos<span class="required"></span></label>
                                    <input type="text" name="apellido" class="field-long" />
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
                                    <input class="waves-effect waves-light btn blue darken-4" type="submit" name="submit" value="Enviar">
                                </li>

                            </ul>
                        </fieldset>
                    </form>
                </div>

            </section>

        </div>

        <?php include '../common/scriptsAdmin.php'; ?>
</body>
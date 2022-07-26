<?php

include "../../cliente/config.php";

$sql = "SELECT * FROM categoria";

$categorias = $conn->query($sql);



if (isset($_POST['submit'])) {

    $nombre = $_POST['nombre'];

    $precio = $_POST['precio'];

    $descripcion = $_POST['descripcion'];

    $foto = $_POST['foto'];

    $categoria = $_POST['categoria'];

    $sql = "INSERT INTO producto(nombre, precio, descripcion, foto, idCategoria) VALUES ('$nombre','$precio','$descripcion','$foto','$categoria')";

    $result = $conn->query($sql);

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Crear producto</title>
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
                    <form action="" method="POST">
                        <fieldset>
                            <ul class="form-style-1">
                                <li>
                                    <label>Nombre<span class="required"></span></label>
                                    <input type="text" name="nombre" class="field-long" />
                                </li>

                                <li>
                                    <label>Precio<span class="required"></span></label>
                                    <input type="number" name="precio" class="field-long" />
                                </li>

                                <li>
                                    <label>Descripcion<span class="required"></span></label>
                                    <input type="text" name="descripcion" class="field-long" />
                                </li>
                                <li>
                                    <label>Foto<span class="required"></span></label>
                                    <input type="text" name="foto" class="field-long" />
                                </li>
                                <li>
                                    <label>Categorias</label>
                                    <select name="categoria" class="field-select">
                                        <?php

                                        if ($categorias->num_rows > 0) {

                                            while ($row = $categorias->fetch_assoc()) {


                                        ?>

                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                        <?php       }
                                        }

                                        ?>
                                    </select>
                                </li>
                                <li>
                                    <input type="submit" name="submit" value="Crear" class="waves-effect waves-light btn">
                                </li>

                            </ul>
                        </fieldset>
                    </form>
                </div>

            </section>

        </div>

        <?php include '../common/scriptsAdmin.php'; ?>
</body>
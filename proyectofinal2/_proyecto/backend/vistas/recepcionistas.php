<!DOCTYPE html>
<html lang="en">

<head>
    <title>Recepcionistas</title>
</head>

<body>
    <!-- START CONTENT -->
    <section id="content">
        <!--start container-->
        <div class="container">
            <!--search bar-->
            <nav>
                <div class="nav-wrapper">
                    <form>
                        <div class="input-field grey lighten-2">
                            <input id="search" type="search" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </nav>
            <div class="row">
                <div class="col s12">
                    <table class="bordered responsive-table highlight">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                                <th><a href="registrarCliente.php" class="waves-effect waves-light btn blue darken-4">Registrar</a></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            if ($clientes->num_rows > 0) {

                                while ($row = $clientes->fetch_assoc()) {

                            ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['nombres']; ?></td>
                                        <td><?php echo $row['apellidos']; ?></td>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, options);
        });
    </script>
</body>
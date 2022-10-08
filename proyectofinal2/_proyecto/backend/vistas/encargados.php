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
            <div class="row">
                <div class="col s12">
                    <table class="bordered responsive-table highlight">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Código</th>
                                <th>Recepción</th>
                                <th>Apellidos</th>
                                <th>Acciones</th> 
                                <div class="input-field col s12">
    <select>
      <option value="" disabled selected>Estado</option>
      <option value="1">Pendiente</option>
      <option value="2">En revisión</option>
      <option value="3">En reparto</option>
    </select>
    <label>Materialize Select</label>
  </div>
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
</body>
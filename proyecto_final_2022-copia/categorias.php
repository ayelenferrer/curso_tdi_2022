<?php

include "config.php";

$sql = "SELECT * FROM categoria";

$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="tabla.css" rel="stylesheet">

    <title>Categorias</title>


</head>

<body>

    <?php include 'barraNav.php'; ?>

    

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th><span>Acciones</span><a  href= "crearCat.php" class="button buttongreen">Crear</a></th>
             
            </tr>
            
        </thead>
        <tbody>

            <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

            ?>
                    <tr>
                        <td data-column="id"><?php echo $row['id']; ?></td>
                        <td data-column="nombre"><?php echo $row['nombre']; ?></td>
                        <td data-column="acciones"><a href="borrarCat.php?id=<?php echo $row['id']; ?>" class="button buttonred"><i class='buttonicon bx bx-trash'></i></a></td>
                    </tr>

            <?php       }
            }

            ?>

        </tbody>
    </table>



    <?php include 'footer.php'; ?>


</body>

</html>
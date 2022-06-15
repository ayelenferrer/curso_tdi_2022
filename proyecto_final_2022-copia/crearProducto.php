<?php 

include "config.php";

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

    if ($result == TRUE) {

        echo "New record created successfully.";

    }else{

        echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="form.css" rel="stylesheet">
    
    <title>Crear Producto</title>

    
</head>

<body>
    
<?php include 'barraNav.php';?>


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
        <input type="submit" name="submit" value="submit">
    </li>
  
</ul>
</fieldset>
</form>

        <?php include 'footer.php';?>

    
</body>
</html>
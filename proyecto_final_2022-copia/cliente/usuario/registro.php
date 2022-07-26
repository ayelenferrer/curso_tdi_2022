<?php 

include "../config.php";

  if (isset($_POST['submit'])) {

    $nombre = $_POST['nombre'];

    $apellido = $_POST['apellido'];

    $email = $_POST['email'];

    $documento = $_POST['documento'];

    $telefono = $_POST['telefono'];

    $clave = $_POST['clave'];

    $sql = "INSERT INTO usuarios(nombre, apellido, email, documento, telefono, clave) VALUES ('$nombre','$apellido','$email','$documento','$telefono', '$clave')";

    $result = $conn->query($sql);

    $conn->close(); 

  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../estilos/form.css" rel="stylesheet">
    
    <title>Registrarme</title>

    
</head>

<body>
    
<?php include '../common/barraNav.php';?>


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
        <input type="email" name="email" class="field-long" />
    </li>
    <li>
        <label>Documento<span class="required"></span></label>
        <input type="text" name="documento" class="field-long" />
    </li>
    <li>
        <label>Teléfono<span class="required"></span></label>
        <input type="text" name="telefono" class="field-long" />
    </li>
    <li>
        <label>Contraseña<span class="required"></span></label>
        <input type="password" name="clave" class="field-long" />
    </li>
      

    <li>
        <input type="submit" name="submit" value="Registrarme">
    </li>
  
</ul>
</fieldset>
</form>

        <?php include '../common/footer.php';?>

    
</body>
</html>
<?php 

include "config.php";

  if (isset($_POST['submit'])) {

    $nombre = $_POST['nombre'];

    $sql = "INSERT INTO categoria(nombre) VALUES ('$nombre')";

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
    
    <title>Crear categoria</title>

    
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
        <input type="submit" name="submit" value="submit">
    </li>
</ul>
</fieldset>
</form>

        <?php include 'footer.php';?>

    
</body>
</html>
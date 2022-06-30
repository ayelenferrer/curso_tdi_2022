<?php 

include "config.php";

$sql = "SELECT * FROM producto";

$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./pruebasCarrito/carrito.js" type="text/javascript"> </script>
    <title>Productos</title>

    
</head>

<body>
    
<?php include 'barraNav.php';?>
       

    
<div id="new"> </div>

        <?php include 'footer.php';?>

        <script>
    var datastring = localStorage.getItem('productosCarrito')??'[]';
    var data = JSON.parse(datastring);
    data.forEach (x=>{ 
        var tag = document.createElement("p");
        var text = document.createTextNode(x.nombre+" " + x.precio + x.cantidad);
        tag.appendChild(text);
        var element = document.getElementById("new");
        element.appendChild(tag);
    })
    
</script>    
</body>
</html>
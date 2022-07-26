<?php

include "../config.php";
$id = $_GET['id'];

$sql = "DELETE FROM producto WHERE id = $id"; 

$result = $conn->query($sql);


header("Location: tablaProductos.php");


?>
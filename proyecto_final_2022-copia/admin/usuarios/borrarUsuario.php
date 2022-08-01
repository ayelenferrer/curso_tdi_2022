<?php

include "../../cliente/config.php";

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id = $id"; 

$result = $conn->query($sql);


header("Location: tablaUsuarios.php");


?>
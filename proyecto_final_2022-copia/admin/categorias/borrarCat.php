<?php

include "../../cliente/config.php";

$id = $_GET['id'];

$sql = "DELETE FROM categoria WHERE id = $id"; 

$result = $conn->query($sql);


header("Location: tablaCategorias.php");


?>
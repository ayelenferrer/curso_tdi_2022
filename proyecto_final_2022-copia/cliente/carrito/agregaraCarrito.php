<?php

session_start();

include '../config.php';
require 'funciones.php';



if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    $cantidad = $_GET['cantidad'];
    $sql = "SELECT * FROM producto WHERE id = $id";

    $result = $conn->query($sql);
    
    //    $_SESSION[''] = $row['email'];  
if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result);

    agregarProducto($row, $id, $cantidad);



    echo print_r($row);
}
}

header("Location: ../productos/productos.php");



?>
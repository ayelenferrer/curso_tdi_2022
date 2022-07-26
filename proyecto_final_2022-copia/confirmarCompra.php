<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
    require 'funciones.php';
    include "config.php";

    $id_cliente = $_SESSION['id'];

    $sql = "INSERT INTO pedido(fecha, id_cliente) VALUES (curdate(),'$id_cliente')";

    $result = $conn->query($sql);
    $id_pedido = mysqli_insert_id($conn);
    
    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $indice => $value){
            $total = $value['precio'] * $value['cantidad'];
            $cantidad = $value['cantidad'];
            $id_producto = $value['id'];
            $sql = "INSERT INTO pedido_producto(id_pedido, id_producto, cantidad, total) VALUES ('$id_pedido', '$id_producto', '$cantidad', '$total')";
            $result = $conn->query($sql);
        }

    }

    header("Location: borrarProductoCarrito.php?all=true");
?>


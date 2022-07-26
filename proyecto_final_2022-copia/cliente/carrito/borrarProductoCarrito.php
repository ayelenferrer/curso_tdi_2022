<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if(isset($_GET['all']) && $_GET['all'] === 'true' ){
    unset($_SESSION['carrito']);
}
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
  unset($_SESSION['carrito'][$id]);
}
header("Location: carrito.php");
?>
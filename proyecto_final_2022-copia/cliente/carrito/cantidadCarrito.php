<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if(isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['suma']) ){
    $id = $_GET['id'];
    $suma = $_GET['suma'];
  if($suma==='true')
        $_SESSION['carrito'][$id]['cantidad'] +=1;
    else
        $_SESSION['carrito'][$id]['cantidad']-=1;
}
header("Location: carrito.php");
?>
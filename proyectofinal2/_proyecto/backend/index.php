<?php


	@session_start();
	
	if(isset($_SESSION['nombre'])){
        echo 'EL DATO EN LA SESION ES: ',$_SESSION['nombre'];
		header('Location: sistema.php?r=menu');
	}else{
		header('Location: login.php');
	}




?>
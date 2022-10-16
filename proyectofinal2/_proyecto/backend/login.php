<?php

	require_once("modelos/empleados_modelo.php");

	$estado  =  "";
	$usuario = isset($_POST['email'])?$_POST['email']:"";  
	$clave 	 = isset($_POST['clave'])?$_POST['clave']:"";

	if($usuario != ""  && $clave != ""){

		$objEmpleados= new empleados_modelo;
		$respuesta = $objEmpleados->validarLogin($usuario,$clave);	

		if(isset($respuesta[0]['id']) && $respuesta[0]['id'] != ""){

			@session_start();
			$_SESSION['fecha'] = date("Y-m-a");		
			$_SESSION['email'] = $respuesta[0]['mail'];
            $_SESSION['tipo'] = $respuesta[0]['tipo'];

			$linea = "email:".$usuario." - login:ok";
			header('Location: sistema.php?r=menu');

		}else{

			$linea = "email:".$usuario." - login:error";
			$estado = "Error";

		}
	}

?>





<html>

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
    }

    body {
      background: #fff;
    }

    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
      color: #e91e63;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #e91e63;
      box-shadow: none;
    }

    .logo_imagen {
        width: 100px;
        border-radius: 50px;
    }
  </style>
</head>

<body>
  <div class="section"></div>
  <main>
    <center>
      <img class="responsive-img logo_imagen" style="width: 100px;" src="./web/img/logo.png" />
      <div class="section"></div>

      <h5 class="indigo-text">Por favor, ingrese los datos de su cuenta</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='email' name='email' id='email' />
                <label for='email'>Ingrese su correo</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='clave' id='clave' />
                <label for='clave'>Ingrese su contraseña</label>
              </div>
              <label style='float: right;'>
								<a class='pink-text' href='#!'><b>¿Olvidaste tu contraseña?</b></a>
							</label>
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Iniciar sesion</button>
              </div>
            </center>
          </form>
        </div>
      </div>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</body>

</html>
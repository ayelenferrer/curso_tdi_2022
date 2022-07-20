<?php

session_start(); 

include "config.php";
if (isset($_POST['email']) && isset($_POST['clave'])) {
  echo '<h1>la contraseña es</h1> ' +  $_POST['clave'];  
    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $email = validate($_POST['email']);

    $clave = validate($_POST['clave']);

    if (empty($email)) {

        header("Location: index.php?error=User Name is required");

        exit();

    }else if(empty($clave)){

        header("Location: index.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM usuarios WHERE email='$email' AND clave='$clave'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $email && $row['clave'] === $clave) {

                echo "Logged in!";

                $_SESSION['email'] = $row['email'];

                $_SESSION['clave'] = $row['clave'];

                $_SESSION['id'] = $row['id'];

                if ($row['estado'] == 1) {
                  $_SESSION['tipo'] = "ADMIN";
                  header("Location: plantilla_adminMaterialize/administradores.php");
                }
                else {
                  $_SESSION['tipo'] = "CLIENTE";
                  header("Location: productos.php");
                  
                }


                exit();

            }else{

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Inicio de sesión</title>
    <!-- CORE CSS-->
    <link href="css//materialize.css" type="text/css" rel="stylesheet">
    <link href="css//style.css" type="text/css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <link rel="icon" href="imágenes/r.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;600&display=swap" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="css/custom/custom.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
  </head>

  <body>
  <div class="limiter"></div>
    <div class="container-login100 ">
      <div class="wrap-login100 p-t-50 p-b-90">
        <form class="login100-form validate-form flex-sb flex-w" action="" method="POST"> 
          <span class="login100-form-title p-b-51">Iniciar sesión</span>
          <div class="wrap-input100 validate-input m-b-16" data-validate="Se requiere email">
            <input class="input100" type="text" name="email" placeholder="Email">
            <span class="focus-input100"></span>
    </div>
    <div class="wrap-input100 validate-input m-b-16">
      <input class="input100" type="password" name="clave" placeholder="Clave">
      <span class="focus-input100"></span>
    </div>
    <div class="container-login100-form-btn m-t-17">
      <button class="login100-form-btn" href="administradores.php">Ingresar</button>
    </div>
        </form>
    
      </div>
      </div>
    </div>

    </body>

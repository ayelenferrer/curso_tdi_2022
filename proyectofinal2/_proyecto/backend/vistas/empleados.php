<?php

	require_once("modelos/empleados_modelo.php");

	$objEmpleados = new empleados_modelo();


	// Evaluar las acciones que mando
	$error = array();
	if(isset($_GET['accion']) && $_GET['accion'] == "ingresar"){

		// En caso que la accion sera ingresar procedemos a ingresar el registro
		$objEmpleados->constructor();
		$error = $objEmpleados->ingresar();

	}
	if(isset($_GET['a']) && $_GET['a'] == "borrar"){

		$id = isset($_GET['id'])?$_GET['id']:"";
		$objEmpleados->cargar($id);	
		$error = $objEmpleados->borrar();
        header('Location: sistema.php?r=empleados');
	}

	if(isset($_GET['accion']) && $_GET['accion'] == "guardar"){

		// En caso que la accion sera ingresar procedemos a ingresar el registro
		$objEmpleados->constructor();
		$error = $objEmpleados->guardar();

	}
		

	// Armamos el paginado
	$arrayFiltro 	= array("pagina" => "1");
	if(isset($_GET['p']) && !Empty($_GET['p']) && $_GET['p'] != ""){
		$arrayFiltro["pagina"] = $_GET['p'];
	}
	$arrayPagina = $objEmpleados->paginador($arrayFiltro["pagina"]);



	$listaEmpleados	= $objEmpleados->listar($arrayFiltro);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Empleados</title>
</head>

<body>
    <?PHP 

    if(isset($_GET['a']) && $_GET['a'] == "borrar"){ 
                $idRegistro = isset($_GET['id'])?$_GET['id']:"";

    ?>
    <!-- Modal Structure -->
    <div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Modal Header</h4>
        <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
    </div>
    <?PHP } ?>

    <!-- START CONTENT -->
    <section id="content">
        <!--start container-->
        <div class="container">
            <!--search bar-->
            <nav>
                <div class="nav-wrapper">
                    <form>
                        <div class="input-field grey lighten-2">
                            <input id="search" type="search" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </nav>
            <div class="row">
                <div class="col s12">
                    <table class="bordered responsive-table highlight">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <th>Tipo</th>
                                <th>Acciones</th>
                                <th><a href="sistema.php?r=registrarEmpleado" class="waves-effect waves-light btn blue darken-4">Registrar</a></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                foreach($listaEmpleados as $empleado){
                                    if($empleado['tipo']!='admin'){
                            ?>
                                    <tr>
                                        <td><?=$empleado['id']?></td>
                                        <td><?=$empleado['mail']?></td>
                                        <td><?=$empleado['tipo']?></td>
                                        <td>
                                            <a class="waves-effect waves-light btn-small red darken-1" href="sistema.php?r=empleados&id=<?php echo $empleado['id']; ?>&a=borrar"><i class="material-icons">delete</i></a>
                                            <a class="waves-effect waves-light btn-small yellow lighten-1" href="sistema.php?r=editarEmpleado&id=<?php echo $empleado['id']; ?>&a=editar"><i class="material-icons">create</i></a>
                                        </td>
                                    </tr>

                            <?php
                                    }
                                }
                            ?>
                             <?php
                                foreach($listaEmpleados as $empleado){
                                    if($empleado['tipo']!='recepcionista'){
                            ?>
                                    <tr>
                                        <td><?=$empleado['id']?></td>
                                        <td><?=$empleado['mail']?></td>
                                        <td><?=$empleado['tipo']?></td>
                                        <td>
                                            <a class="waves-effect waves-light btn-small red darken-1" href="sistema.php?r=clientes&id=<?php echo $cliente['id']; ?>&a=borrar"><i class="material-icons">delete</i></a>
                                            <a class="waves-effect waves-light btn-small yellow lighten-1" href="sistema.php?r=editarCliente&id=<?php echo $cliente['id']; ?>&a=editar"><i class="material-icons">create</i></a>
                                        </td>
                                    </tr>

                            <?php
                                    }
                                }
                            ?>
                             <?php
                                foreach($listaEmpleados as $empleado){
                                    if($empleado['tipo']!='encargado,cadete'){
                            ?>
                                    <tr>
                                        <td><?=$empleado['id']?></td>
                                        <td><?=$empleado['mail']?></td>
                                        <td><?=$empleado['tipo']?></td>
                                        <td>
                                            <a class="waves-effect waves-light btn-small red darken-1" href="sistema.php?r=envios&id=<?php echo $envio['id']; ?>&a=borrar"><i class="material-icons">delete</i></a>
                                            <a class="waves-effect waves-light btn-small yellow lighten-1" href="sistema.php?r=editarEnvio&id=<?php echo $envio['id']; ?>&a=editar"><i class="material-icons">create</i></a>
                                        </td>
                                    </tr>

                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                    <ul class="pagination center text-center">
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    <li class="active blue darken-4"><a href="#!">1</a></li>
    <li class="waves-effect"><a href="#!">2</a></li>
    <li class="waves-effect"><a href="#!">3</a></li>
    <li class="waves-effect"><a href="#!">4</a></li>
    <li class="waves-effect"><a href="#!">5</a></li>
    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
  </ul>
                </div>
            </div>
        </div>
    </section>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, options);
        });
    </script>
</body>
<?php

	require_once("modelos/clientes_modelo.php");

	$objClientes = new clientes_modelo();

    if(isset($_GET['a']) && $_GET['a'] == "borrar"){

        $id = isset($_GET['id'])?$_GET['id']:"";
        $objClientes->cargar($id);
        $error = $objClientes->borrar();
        header('Location: sistema.php?r=clientes');
    }
	// Armamos el paginado
	$arrayFiltro 	= array("pagina" => "1");
	if(isset($_GET['p']) && !Empty($_GET['p']) && $_GET['p'] != ""){
		$arrayFiltro["pagina"] = $_GET['p'];
	}

    if(isset($_POST['search']) ){
        $arrayFiltro["search"] = $_POST['search']; 
    }

	$arrayPagina = $objClientes->paginador($arrayFiltro["pagina"]);

	$listaClientes	= $objClientes->listar($arrayFiltro);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clientes</title>
    <style>
        .disabled {
            pointer-events: none;
        }
    </style>
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
                <form method="POST">
                        <div class="input-field grey lighten-2">
                            <input id="search" name="search" type="search" >
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
                                <th>Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Teléfono</th>
                                <th><a href="sistema.php?r=registrarCliente" class="waves-effect waves-light btn blue darken-4">Registrar</a></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                foreach($listaClientes as $cliente){
                            ?>
                                    <tr>
                                        <td><?=$cliente['id']?></td>
                                        <td><?=$cliente['documento']?></td>
                                        <td><?=$cliente['nombres']?></td>
                                        <td><?=$cliente['apellidos']?></td>
                                        <td><?=$cliente['telefono']?></td>
                                        <td>
                                            <a class="waves-effect waves-light btn-small red darken-1" href="sistema.php?r=clientes&id=<?php echo $cliente['id']; ?>&a=borrar"><i class="material-icons">delete</i></a>
                                            <a class="waves-effect waves-light btn-small yellow lighten-1" href="sistema.php?r=editarCliente&id=<?php echo $cliente['id']; ?>&a=editar"><i class="material-icons">create</i></a>
                                        </td>
                                    </tr>

                            <?php
                                    
                                }
                            ?>
                        </tbody>
                    </table>
                 
                    <ul class="pagination center text-center">
						<li <?= $arrayPagina['pagina']==1? 'class="waves-effect disabled"':''?> ><a href="sistema.php?r=clientes&p=<?=$arrayPagina['paginaAtras']?>"><i class="material-icons">chevron_left</i></a></li>
                        <?php
                        for($i = 1; $i<=$arrayPagina['totalPagina'] ; $i++){
                            $activo = "waves-effect";
                            if($arrayPagina['pagina'] == $i){
                                $activo = "active blue darken-4";
                            }						
                        ?>
                            <li class="<?=$activo?>"><a href="sistema.php?r=clientes&p=<?=$i?>"><?=$i?></a></li>
                        <?php
                            }
                        ?>
						<li <?= $arrayPagina['pagina']>=$arrayPagina['totalPagina'] ? 'class="waves-effect disabled"':''?>><a href="sistema.php?r=clientes&p=<?=$arrayPagina['paginaSiguiente']?>"><i class="material-icons">chevron_right</i></a></li>
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
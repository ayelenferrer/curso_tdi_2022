<?php

	require_once("modelos/envios_modelo.php");

	$objEnvios = new envios_modelo();

	// Armamos el paginado
	$arrayFiltro 	= array("pagina" => "1");
    $pagina = 1;
	if(isset($_GET['p']) && !Empty($_GET['p']) && $_GET['p'] != ""){
        $pagina = $_GET['p'];
		$arrayFiltro["pagina"] = $_GET['p'];
	}
    if(isset($_POST['search']) ){
        $arrayFiltro["search"] = $_POST['search']; 
    }
	$listaEnvios	= $objEnvios->listar($arrayFiltro);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Envios</title>
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
                                <th>Código</th>
                                <th>Destinatario</th>
                                <th>Recepción</th>
                                <th>Envio</th>
                                <th>Calle</th>
                                <th>Puerta</th>
                                <th>Apartamento</th>
                                <th>Otros</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                foreach($listaEnvios as $envio){
                            ?>
                                    <tr>
                                        <td><?=$envio['codigo']?></td>
                                        <td><?=$envio['destinatario']?></td>
                                        <td>
                                            <?php
                                                if(!isset($envio['fecha_recepcion'])){
                                                    echo '<span class="red-text text-darken-2">NO RECIBIDO</span>';
                                                }
                                                else{
                                                    echo $envio['fecha_recepcion'];
                                                }
                                            ?>
                                        </td>
                                        <td><?=$envio['fecha_envio']?></td>
                                        <td><?=$envio['calle']?></td>
                                        <td><?=$envio['numero_puerta']?></td>
                                        <td><?=$envio['apartamento']?></td>
                                        <td><?=$envio['otros']?></td>
                                        <td>
                                            <?php
                                                if($envio['estado']=='pendiente'){
                                                    echo '<span class="blue-text text-darken-2">PENDIENTE</span>';
                                                }
                                                if($envio['estado']=='en_reparto'){
                                                    echo '<span class="orange-text text-darken-2">EN REPARTO</span>';
                                                }
                                                if($envio['estado']=='en_camino'){
                                                    echo '<span class="yellow-text text-darken-2">EN CAMINO</span>';
                                                }
                                                if($envio['estado']=='entregado'){
                                                    echo '<span class="green-text text-darken-2">ENTREGADO</span>';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn-small yellow lighten-1" href="sistema.php?r=editarEnvio&id=<?php echo $envio['identificador']; ?>&a=editar"><i class="material-icons">create</i></a>
                                        </td>
                                    </tr>

                            <?php
                                    
                                }
                            ?>
                        </tbody>
                    </table>
                 
                    <ul class="pagination center text-center">
						<li <?= $pagina==1? 'class="waves-effect disabled"':''?>><a href="sistema.php?r=envios&p=<?=$pagina - 1?>"><i class="material-icons">chevron_left</i></a></li>
                        <?php
                        $totalRegistros = $objEnvios->totalRegistros();
                        $totalPagina = ceil($totalRegistros/10);
                        for($i = 1; $i<=$totalPagina ; $i++){
                            $activo = "waves-effect";
                            if($pagina == $i){
                                $activo = "active blue darken-4";
                            }						
                        ?>
                            <li class="<?=$activo?>"><a href="sistema.php?r=envios&p=<?=$i?>"><?=$i?></a></li>
                        <?php
                        }
                        ?>
						<li <?= $pagina>=$totalPagina? 'class="waves-effect disabled"':''?>><a href="sistema.php?r=envios&p=<?=$pagina + 1?>"><i class="material-icons">chevron_right</i></a></li>
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
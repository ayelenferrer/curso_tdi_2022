<?php
require_once("modelos/clientes_modelo.php");

require_once("modelos/envios_modelo.php");

$objClientes = new clientes_modelo();
if (isset($_POST['submit'])) {

        $objEnvios = new envios_modelo();

        $objEnvios->constructor();

        $error = $objEnvios->ingresar();

        if(isset($error['estado']) && $error['estado'] == 'Ok'){
            header("Location: sistema.php?r=envios");
        }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrar Envio</title>
    <style>
        span {
            font-weight: bold;
            font-size: 1.1em;
            margin-right:4px;
        }
        .material-icons {
            font-size: 1.5em;
            position: relative;
            top: 5px;
            margin-right: 0.5em;
        }	
        .dropdown-content li>a, .dropdown-content li>span {
            color:rgb(13,71,161);
        }
    </style>
    <script>

        async function obtenerClientes(){
            try {
                var filtro = $('#idcliente').val();
                const response = await $.ajax({
                        data: {"filtro" : filtro},
                        type: "GET",
                        dataType: "json",
                        url: "ws.php?c=listarClientes"
                });
                const clientes = response.reduce((accumulator, value) => {
                    return {...accumulator, [value.nombres + ' ' + value.apellidos + ' - ' + value.documento]: ''};
                }, {});
                return clientes;
            }
            catch(e){
                
            }
        }

        async function obtenerCiudades(){
            try{
                var filtro = $('#idciudad').val();
                const response = await $.ajax({
                        data: {"filtro" : filtro},
                        type: "GET",
                        dataType: "json",
                        url: "ws.php?c=listarCiudades"
                });
                const ciudades = response.reduce((accumulator, value) => {
                    return {...accumulator, [value.id + ' - ' + value.nombre + ' - ' + value.departamento]: ''};
                }, {});
                return ciudades;
            }
            catch(e){

            }
            var filtro = $('#idciudad').val();
           
        }

        function setCliente(){
            // Set cliente
            const cliente = $('#idcliente').val();
            const documento = cliente.split(' - ');
            $('#idcliente').val(documento[1]);
            const ciudad = $('#idciudad').val();
            const id = ciudad.split(' - ');
            $('#idciudad').val(id[0]);
            console.log(id[0])
        }

        $(document).ready(async function(){
            $('#registrarCliente').hide();

            $('select').material_select();
            var elems = document.querySelectorAll('.autocomplete');

            const clientes = await obtenerClientes();

            M.Autocomplete.init(elems[0], {
                data: clientes,
                minLength: 0, 
            });

            const ciudades = await obtenerCiudades();

            M.Autocomplete.init(elems[1], {
                data: ciudades,
                minLength: 0, 
            });

            $('#idcliente').on('keyup', async function(){
                    const clientes = await obtenerClientes();
                    var instance = M.Autocomplete.getInstance(elems[0]);
                    instance.updateData(clientes);
                    if ( instance.count === 0 ) {
                        console.log('no matches');
                        $('#registrarCliente').show();
                    }
                    else{
                        $('#registrarCliente').hide();
                    }
            });

            $('#idciudad').on('keyup', async function(){
                    const ciudades = await obtenerCiudades();
                    var instance = M.Autocomplete.getInstance(elems[1]);
                    instance.updateData(ciudades);
            });
        });
    </script>
</head>

<body>
            <!-- START CONTENT -->
            <section id="content">
                <!--start container-->
                <div class="container">
                    <form action="" method="POST" onsubmit="setCliente()">
                        <fieldset>
                            <ul class="form-style-1">
                                <li class="right-align">
                                    <a href="sistema.php?r=registrarCliente" id="registrarCliente" name="registrarCliente" class="waves-effect waves-light btn blue darken-4">Registrar</a>
                                </li>
                                <li>
                                    <label>Cliente<span class="required"></span></label>
                                    <div class="input-field col s12">
                                        <div class="input-field col s12">
                                            <input type="text" id="idcliente" name="idcliente" class="autocomplete" autocomplete="off">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <label>Destinatario<span class="required"></span></label>
                                    <input type="text" id="destinatario" name="destinatario" class="field-long" />
                                </li>
                                <li>
                                    <label>Ciudad<span class="required"></span></label>
                                    <div class="input-field col s12">
                                        <div class="input-field col s12">
                                            <input type="text" id="idciudad" name="idciudad" class="autocomplete" autocomplete="off">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <label>Calle<span class="required"></span></label>
                                    <input type="text" id="calle" name="calle" class="field-long" />
                                </li>
                                <li>
                                    <label>Puerta<span class="required"></span></label>
                                    <input type="text" id="numero_puerta" name="numero_puerta" class="field-long" />
                                </li>
                                <li>
                                    <label>Apartamento<span class="required"></span></label>
                                    <input type="text" id="apartamento" name="apartamento" class="field-long" />
                                </li>
                                <li>
                                    <label>Otros<span class="required"></span></label>
                                    <input type="text" id="otros" name="otros" class="field-long" />
                                </li>
                                <li>
                                    <input class="waves-effect waves-light btn blue darken-4" type="submit" name="submit" value="Enviar">
                                </li>


                            </ul>
                        </fieldset>
                    </form>
                    <?php if(isset($error['mensaje'])){ ?>
                        <div class="alert card red lighten-4 red-text text-darken-4">
                            <div class="card-content">
                                <p><i class="material-icons">report</i><span><?=$error['mensaje']?></span></p>
                            </div>
                        </div>
                    <?php }?>

                </div>
               
            </section>

        </div>
 
</body>
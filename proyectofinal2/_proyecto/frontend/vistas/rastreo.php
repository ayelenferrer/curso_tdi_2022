<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rastrear</title>
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
            <div class="row">
                <div class="col s12">
                    <table class="bordered responsive-table highlight">
                        <thead>
                            <tr>
                                <th>Destinatario</th>
                                <th>Fecha de envio</th>
                                <th>Estado</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                foreach($listaEnvios as $envio){
                            ?>
                                    <tr>
                                        <td><?=$envio['destinatario']?></td>
                                        <td><?=$envio['fecha_envio']?></td>
                                        <td><?=$envio['estado']?></td>
                                    </tr>

                            <?php
                                    
                                }
                            ?>
                        </tbody>
                    </table>
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
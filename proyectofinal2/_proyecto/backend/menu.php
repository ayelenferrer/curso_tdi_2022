<main>
    <!--Tarjetas/inicio-->
    <div class="row">
        <?php
        @session_start();
        if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'admin') {
        ?>
            <div class="col s12 m3">
                <div class="card gradient-shadow grey lighten-2">
                    <div class="card-content center">
                        <i class="large material-icons">supervisor_account</i>
                        <p class="blacj-text">Empleados</p>
                        <div class="center space">
                            <a class="waves-effect waves-light btn blue darken-4" href="sistema.php?r=empleados">Ver</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <?php
        if (isset($_SESSION['tipo']) && $_SESSION['tipo'] != 'admin') {
        ?>
            <div class="row">
                <div class="col s12 m3">
                    <div class="card gradient-shadow grey lighten-2">
                        <div class="card-content center">
                            <i class="large material-icons">local_shipping</i>
                            <p class="blacj-text">Envios</p>
                            <div class="center space">
                                <a class="waves-effect waves-light btn blue darken-4" href="sistema.php?r=envios">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
        }
        ?>
        <?php
        if (isset($_SESSION['tipo']) && ($_SESSION['tipo'] == 'cadete' || $_SESSION['tipo'] == 'encargado')) {
        ?>
            <div class="row">
                <div class="col s12 m3">
                    <div class="card gradient-shadow grey lighten-2">
                        <div class="card-content center">
                            <i class="large material-icons">local_post_office</i>
                            <p class="blacj-text">Gestionar envio</p>
                            <div class="center space">
                                <a class="waves-effect waves-light btn blue darken-4" href="sistema.php?r=gestionarEnvio">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
        }
        ?>
         <?php
        if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'recepcionista') {
        ?>
                    <div class="row">
                        <div class="col s12 m3">
                            <div class="card gradient-shadow grey lighten-2">
                                <div class="card-content center">
                                    <i class="large material-icons">face</i>
                                    <p class="blacj-text">Clientes</p>
                                    <div class="center space">
                                        <a class="waves-effect waves-light btn blue darken-4" href="sistema.php?r=clientes">Ver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m3">
                            <div class="card gradient-shadow grey lighten-2">
                                <div class="card-content center">
                                    <i class="large material-icons">art_track</i>
                                    <p class="blacj-text">Registrar envio</p>
                                    <div class="center space">
                                        <a class="waves-effect waves-light btn blue darken-4" href="sistema.php?r=registrarEnvio">Ver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</main>
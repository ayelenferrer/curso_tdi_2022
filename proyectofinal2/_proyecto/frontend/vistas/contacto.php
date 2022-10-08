<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../backend/web/css/materialize.css" media="screen,projection" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;600&amp;display=swap" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <main>
        <section class="container">
            <div class="row">
                <h3 class="center-align">Contacto</h3>
                <article class="col s6 offset-s3">
                    <form method="POST" action="formulario-contacto.php">
                        <div class="input-field">
                            <i class="material-icons prefix">perm_identity</i>
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" required>
                        </div>

                        <div class="input-field">
                            <i class="material-icons prefix">person_pin</i>
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" required>
                        </div>

                        <div class="input-field">
                            <i class="material-icons prefix">email</i>
                            <label for="email">Email</label>
                            <input type="email" name="email" required>
                        </div>

                        <div class="input-field">
                            <i class="material-icons prefix">local_phone</i>
                            <label for="mensaje">Teléfono</label>
                            <textarea name="mensaje" id="" rows="10" class="materialize-textarea" length="140" required></textarea>
                        </div>

                        <div class="input-field">
                            <i class="material-icons prefix">smartphone</i>
                            <label for="mensaje">Número de rastreo</label>
                            <textarea name="mensaje" id="" rows="10" class="materialize-textarea" length="140" required></textarea>
                        </div>

                        <div class="input-field">
                            <i class="material-icons prefix">mode_edit</i>
                            <label for="mensaje">Mensaje</label>
                            <textarea name="mensaje" id="" rows="10" class="materialize-textarea" length="140" required></textarea>
                        </div>

                        <p class="center-align">
                            <button class="waves-effect waves-light btn blue darken-4" type="submit"><i class="material-icons right">send</i>enviar</button>
                        </p>
                    </form>
                </article>
            </div>
        </section>
        </br>
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    </main>
</body>

</html>
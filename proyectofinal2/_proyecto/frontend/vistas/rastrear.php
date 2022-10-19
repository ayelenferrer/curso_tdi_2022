<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastrear</title>
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
                <h3 class="center-align">Rastrear un envío</h3>
                <article class="col s6 offset-s3">
                    <form method="GET" action="index.php?r=rastreo">
                        <div class="input-field">
                            <label for="nombre">Codigo de envio</label>
                            <input type="text" id="codigo" name="codigo" required>
                            <input type="hidden" id="r" name="r" value="rastreo" required>
                        </div>
                        <p class="center-align">
                            <button href="rastreo.php?r=rastreo" class="waves-effect waves-light btn blue darken-4" type="submit">Buscar</button>
                        </p>
    </main>
</body>

</html>
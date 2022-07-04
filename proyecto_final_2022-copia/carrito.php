<?php 

include "config.php";

$sql = "SELECT * FROM producto";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./pruebasCarrito/carrito.js" type="text/javascript"> </script>
    <title>Productos</title>
    <style>
        .cartbody {
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right, #fad4ff, #f4dff7);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .CartContainer {
            width: 70%;
            height: 90%;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0px 10px 20px #1687d933;
        }

        .Header {
            margin: auto;
            width: 90%;
            height: 15%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .Heading {
            font-size: 20px;
            font-family: 'Open Sans';
            font-weight: 700;
            color: #2F3841;
        }

        .Action {
            font-size: 14px;
            font-family: 'Open Sans';
            font-weight: 600;
            color: #E44C4C;
            cursor: pointer;
            border-bottom: 1px solid #E44C4C;
        }

        .Cart-Items {
            margin: auto;
            width: 90%;
            height: 30%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .image-box {
            width: 20%;
            text-align: center;
        }

        .about {
            height: 100%;
            width: 24%;
        }

        .title {
            font-size: 32px;
            font-family: 'Open Sans';
            font-weight: 800;
            margin-left: 0!important;
            color: #202020;
        }

        .subtitle {
            font-size: 18px;
            font-family: 'Open Sans';
            font-weight: 600;
            color: #909090;
        }

        .counter {
            width: 15%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #d9d9d9;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            font-family: 'Open Sans';
            font-weight: 900;
            color: #202020;
            cursor: pointer;
        }

        .count {
            font-size: 20px;
            font-family: 'Open Sans';
            font-weight: 600;
            color: #202020;
        }

        .prices {
            height: 100%;
            text-align: right;
        }

        .amount {
            padding-top: 20px;
            font-size: 26px;
            font-family: 'Open Sans';
            font-weight: 800;
            color: #202020;
        }

        .save {
            padding-top: 5px;
            font-size: 14px;
            font-family: 'Open Sans';
            font-weight: 600;
            color: #1687d9;
            cursor: pointer;
        }

        .remove {
            padding-top: 5px;
            font-size: 14px;
            font-family: 'Open Sans';
            font-weight: 600;
            color: #E44C4C;
            cursor: pointer;
        }

        .pad {
            margin-top: 5px;
        }

        hr {
            width: 66%;
            float: right;
            margin-right: 5%;
        }

        .checkout {
            float: right;
            margin-right: 5%;
            width: 28%;
        }

        .total {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .Subtotal {
            font-size: 22px;
            font-family: 'Open Sans';
            font-weight: 700;
            color: #202020;
        }

        .items {
            font-size: 16px;
            font-family: 'Open Sans';
            font-weight: 500;
            color: #909090;
            line-height: 10px;
        }

        .total-amount {
            font-size: 36px;
            font-family: 'Open Sans';
            font-weight: 900;
            color: #202020;
        }

        .button {
            margin-top: 10px;
            width: 100%;
            height: 40px;
            border: none;
            background: linear-gradient(to bottom right, #fad4ff, #f4dff7);
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            font-family: 'Open Sans';
            font-weight: 600;
            color: #202020;
        }

        .botonBorrar{
            text-decoration: none;
            color: #ffffff;
            background: #cb5757;
            padding: 8px;
            border-radius: 5px;
            margin-left: auto;
            margin-top: 20px;
            border:none;
        }
    </style>

</head>

<body>

    <?php include 'barraNav.php'; ?>
    <div class="cartbody">
        <div class="CartContainer" id="carritoContainer">
            <div class="Header">
                <h3 class="Heading">Carrito</h3>
                <button class="botonBorrar" onclick="limpiarCarrito()">Eliminar todo</button>
            </div>
            <div id="itemsGroup">
            
            </div>
            <hr>
            <div class="checkout">
                <div class="total">
                    <div>
                        <div class="Subtotal">Sub-Total</div>
                        <div class="items">2 items</div>
                    </div>
                    <div class="total-amount">$560</div>
                </div>
                <button class="button">Checkout</button>
            </div>
        </div>
    </div>


    <?php include 'footer.php'; ?>

    <script>
        var datastring = localStorage.getItem('productosCarrito') ?? '[]';
        var data = JSON.parse(datastring);
        var container = document.getElementById("itemsGroup")
        data.forEach(x => {
            var divPadre = document.createElement("div");
            container.appendChild(divPadre);
            var divImg = document.createElement("div");
            var divAbout = document.createElement("div");
            var divCounter = document.createElement("div");
            var divPrices = document.createElement("div");
            divPadre.appendChild(divImg);
            divPadre.appendChild(divAbout);
            divPadre.appendChild(divCounter);
            divPadre.appendChild(divPrices);
            var imagen = document.createElement("img");
            var titulo = document.createElement("h1");
            var subtitulo = document.createElement("h3");
            var botonMas = document.createElement("button");
            var botonMenos = document.createElement("button");
            var divCantidad = document.createElement("div");
            var divPrecio = document.createElement("div");
            var botonEliminar = document.createElement("button");
            divImg.appendChild(imagen);
            divAbout.appendChild(titulo);
            divAbout.appendChild(subtitulo);
            divCounter.appendChild(botonMenos);
            divCounter.appendChild(divCantidad);
            divCounter.appendChild(botonMas);
            divPrices.appendChild(divPrecio);
            divPrices.appendChild(botonEliminar);
            divPadre.className = "Cart-Items pad";
            divImg.className = "image-box";
            divAbout.className = "about";
            imagen.src = "imágenes/" + x.imagen;
            titulo.className = "title";
            subtitulo.className = "subtitle";
            divCounter.className = "counter";
            divPrices.className = "prices";
            botonMas.className = "btn";
            botonMenos.className = "btn";
            divCantidad.className = "count";
            divPrecio.className = "amount";
            botonEliminar.className = "remove";
            titulo.innerHTML = x.nombre;
            divPrecio.innerHTML = "$" + x.precio;
            botonMas.innerHTML = "+";
            botonMenos.innerHTML = "-";
            divCantidad.innerHTML = x.cantidad;
            subtitulo.innerHTML = x.descripcion;


        })
    </script> 
</body>

</html>
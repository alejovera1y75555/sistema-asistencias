<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Bienvenida</title>
    <link rel="stylesheet" href="../asistencia-web/estilo/estilos1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,400;1,300&display=swap" rel="stylesheet">


    <!-- pNotify -->
    <link href="public/pnotify/css/pnotify.css" rel="stylesheet" />
    <link href="public/pnotify/css/pnotify.buttons.css" rel="stylesheet" />
    <link href="public/pnotify/css/custom.min.css" rel="stylesheet" />
    <!-- pnotify -->
    <script src="public/pnotify/js/jquery.min.js">
    </script>
    <script src="public/pnotify/js/pnotify.js">
    </script>
    <script src="public/pnotify/js/pnotify.buttons.js">
    </script>
</head>

<body>
    <?php
    date_default_timezone_set("America/Bogota");
    ?>
    <h1>BIENVENIDOS, REGISTRA TU ASISTENCIA</h1>
    <h2 id="fecha"><?= date("d/m/Y, h:i:s") ?></h2>
    <?php
    include "modelo/conexion.php";
    include "controlador/controlador_registrar_asistencia.php";
    ?>
    <div class="container">
        <a class="acceso" href="../asistencia-web/vista/login/login.php">Ingresar al sistema</a>
        <p class="cedula">Ingrese su Cedula</p>
        <form action="" method="POST">
            <input type="number" placeholder="CC del empleado" name="txtcedula" id="txtcedula">
            <div class="botones">

                <button id="entrada" class="entrada" type="submit" name="btnentrada" value="ok">ENTRADA</button>
                <button id="salida" class="salida" type="submit" name="btnsalida" value="ok">SALIDA</button>
            </div>
        </form>
    </div>


    <script>
        setInterval(() => {
            let fecha = new Date();
            let fechaHora = fecha.toLocaleString();
            document.getElementById("fecha").textContent = fechaHora;
        }, 1000);
    </script>

    <script>
        let cedula = document.getElementById("txtcedula");
        cedula.addEventListener("input", function() {
            if (this.value.length > 10) {
                this.value = this.value.slice(0, 10);
            }
        })

        //eventos para la entrada y salida

        document.addEventListener("keyup", function(event) {
            if (event.code == "ArrowLeft") {
                document.getElementById("entrada").click()
            } else {
                if (event.code == "ArrowRight") {
                    document.getElementById("salida").click()
                }

            }
        })
    </script>

</body>

</html>
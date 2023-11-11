<?php
if (!empty($_POST["btnentrada"])) {
    if (!empty($_POST["txtcedula"])) {
        $cedula = $_POST["txtcedula"];
        $consulta = $conexion->query("select count(*) as 'total' from empleado where cedula='$cedula'");
        $id = $conexion->query("select id_empleado from empleado where cedula='$cedula'");
        if ($consulta->fetch_object()->total > 0) {
            $fecha = date("Y-m-d H:i:s");
            $id_empleado = $id->fetch_object()->id_empleado;
            $consultaFecha = $conexion->query("select entrada from asistencia where id_empleado=$id_empleado order by id_asistencia desc limit 1");
            $fechaBD = $consultaFecha->fetch_object()->entrada;

            if (substr($fecha, 0, 10) == substr($fechaBD, 0, 10)) {
?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "INCORRECTO",
                            type: "error",
                            text: "YA REGISTRO SU ENTRADA",
                            styling: "bootstrap3"
                        })
                    })
                </script>
                <?php } else {
                $sql = $conexion->query("insert into asistencia (id_empleado,entrada) values ($id_empleado,'$fecha')");
                if ($sql == true) { ?>
                    <script>
                        $(function notificacion() {
                            new PNotify({
                                title: "CORRECTO",
                                type: "success",
                                text: "Hola, BIENVENIDO",
                                styling: "bootstrap3"
                            })
                        })
                    </script>
                <?php } else { ?>
                    <script>
                        $(function notificacion() {
                            new PNotify({
                                title: "INCORRECTO",
                                type: "error",
                                text: "Error al registar ENTRADA",
                                styling: "bootstrap3"
                            })
                        })
                    </script>
            <?php }
            }
        } else { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "INCORRECTO",
                        type: "error",
                        text: "La cedula ingresada no existe",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php }
    } else { ?>
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "INCORRECTO",
                    type: "error",
                    text: "Ingrese la cedula",
                    styling: "bootstrap3"
                })
            })
        </script>
    <?php } ?>
    <script>
        setTimeout(() => {
            window.history.replaceState(null, null, window.location.pathname);
        }, 0);
    </script>
<?php }
?>

<!-- REGISTRO SALIDA -->

<?php
if (!empty($_POST['btnsalida'])) {
    if (!empty($_POST['txtcedula'])) {
        $cedula = $_POST['txtcedula'];
        $consulta = $conexion->query("select count(*) as 'total' from empleado where cedula='$cedula'");
        $id = $conexion->query("select id_empleado from empleado where cedula='$cedula'");
        if ($consulta->fetch_object()->total > 0) {

            $fecha = date("Y-m-d h:i:s");
            $id_empleado = $id->fetch_object()->id_empleado;
            $busqueda = $conexion->query("select id_asistencia,entrada from asistencia where id_empleado=$id_empleado order by id_asistencia desc limit 1");


            while ($datos = $busqueda->fetch_object()) {
                $id_asistencia = $datos->id_asistencia;
                $entradaBD = $datos->entrada;
            }

            if (substr($fecha, 0, 10) !== substr($entradaBD, 0, 10)) { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "INCORRECTO",
                            type: "error",
                            text: "PRIMERO REGISTRE SU ENTRADA",
                            styling: "bootstrap3"
                        })
                    })
                </script>
                <?php
            } else {
                $consultaFecha = $conexion->query("select salida from asistencia where id_empleado=$id_empleado order by id_asistencia desc limit 1");
                $fechaBD = $consultaFecha->fetch_object()->salida;

                if (substr($fecha, 0, 10) == substr($fechaBD, 0, 10)) {
                ?>
                    <script>
                        $(function notificacion() {
                            new PNotify({
                                title: "INCORRECTO",
                                type: "error",
                                text: "YA REGISTRO SU SALIDA",
                                styling: "bootstrap3"
                            })
                        })
                    </script>
                    <?php
                } else {
                    $sql = $conexion->query(" update  asistencia set salida= '$fecha' where id_asistencia = $id_asistencia ");
                    if ($sql == true) { ?>
                        <script>
                            $(function notificacion() {
                                new PNotify({
                                    title: "CORRECTO",
                                    type: "success",
                                    text: "ADIOS, Te esperamos pronto",
                                    styling: "bootstrap3"
                                })
                            })
                        </script>
                    <?php } else { ?>
                        <script>
                            $(function notificacion() {
                                new PNotify({
                                    title: "INCORRECTO",
                                    type: "error",
                                    text: "Error al registar SALIDA",
                                    styling: "bootstrap3"
                                })
                            })
                        </script>
            <?php }
                }
            }
        } else { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        tittle: "INCORRECTO",
                        type: "error",
                        text: "La cedula ingresada no existe",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php }
    } else { ?>
        <script>
            $(function notificacion() {
                new PNotify({
                    tittle: "INCORRECTO",
                    type: "error",
                    text: "Ingrese la cedula",
                    styling: "bootstrap3"
                })
            })
        </script>
    <?php } ?>
    <script>
        setTimeout(() => {
            window.history.replaceState(null, null, window.location.pathname);
        }, 0);
    </script>
<?php }
?>
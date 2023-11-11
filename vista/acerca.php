<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
    header('location:login/login.php');
}

?>
<style>
    ul li:nth-child(5) .activo {
        background: rgb(11, 150, 214) !important;
    }
</style>

<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>
<div class="page-content">

    <h4 class="text-center tex-secondary"> DATOS DE LA EMPRESA </h4>

    <?php
    include "../modelo/conexion.php";
    include "../controlador/controlador_modificar_empresa.php";
    $sql = $conexion->query(" SELECT  * from empresa ");

    ?>

    <div class="row">
        <form action="" method="POST">
            <?php
            while ($datos = $sql->fetch_object()) { ?>
                <div hidden class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                    <input type="text" placeholder="id" class="input input__text" name="txtid" value="<?= $datos->id_empresa ?>">
                </div>
                <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                    <input type="text" placeholder="Nombre" class="input input__text" name="txtnombre" value="<?= $datos->nombre ?>">
                </div>
                <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                    <input type="text" placeholder="Telefono" class="input input__text" name="txttelefono" value="<?= $datos->telefono ?>">
                </div>
                <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                    <input type="text" placeholder="Ubicacion" class="input input__text" name="txtubicacion" value="<?= $datos->ubicacion ?>">
                </div>
                <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                    <input type="text" placeholder="Rut" class="input input__text" name="txtrut" value="<?= $datos->rut ?>">
                </div>
                <div class="text-right p-2">
                    <!-- <a href="usuario.php" class="btn btn-secondary btn-rounded">Atras</a>--> 
                    <button type="submit" value="ok" name="btnmodificar" class="btn btn-primary btn-rounded">Modificar</button>
                </div>
            <?php }
            ?>

        </form>
    </div>
</div>
</div>

<?php require('./layout/footer.php'); ?>
<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
    header('location:login/login.php');
}
$id = $_SESSION['id'];
?>

<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>
<div class="page-content">

    <h4 class="text-center tex-secondary"> CAMBIAR CONTRASEÑA </h4>

    <?php
    include "../modelo/conexion.php";
    include "../controlador/controlador_cambiar_clave.php";
    $sql = $conexion->query(" select * from usuario where id_usuario='$_SESSION[id]'");

    ?>

    <div class="row">
        <form action="" method="POST">
            <?php
            while ($datos = $sql->fetch_object()) { ?>
                <div hidden class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                    <input type="text" placeholder="id" class="input input__text" name="txtid" value="<?= $datos->id_usuario ?>">
                </div>
                <div class="fl-flex-label mb-4 px-2 col-12">
                    <input type="password" placeholder="Contraseña Actual" class="input input__text" name="txtclaveactual" value="">
                </div>
                <div class="fl-flex-label mb-4 px-2 col-12">
                    <input type="password" placeholder="Contraseña Nueva" class="input input__text" name="txtclavenueva" value="">
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
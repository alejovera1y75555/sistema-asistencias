<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
  header('location:login/login.php');
}

?>
<style>
  ul li:nth-child(2) .activo {
    background: rgb(11, 150, 214) !important;
  }
</style>

<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>
<div class="page-content">

  <h4 class="text-center tex-secondary"> LISTA DE USUARIOS ADMIN </h4>

  <?php

  include "../modelo/conexion.php";
  include "../controlador/controlador_modificar_usuario.php";
  include "../controlador/controlador_eliminar_usuario.php";

  $sql = $conexion->query(" SELECT  * from usuario ");
  ?>
  <a href="registro_usuario.php" class="btn btn primary btn rounded mb-2"><i class="fa-solid fa-plus"></i> &nbsp;Registrar</a>
  <table class="table table-bordered table-hover w-100" id="example">
    <thead>
      <tr>
        <td scope="col">ID</td>
        <td scope="col">NOMBRE</td>
        <td scope="col">APELLIDO</td>
        <td scope="col">USUARIO</td>
        <td>
        </td>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($datos = $sql->fetch_object()) { ?>
        <tr>
          <td><?= $datos->id_usuario ?></td>
          <td><?= $datos->nombre ?></td>
          <td><?= $datos->apellido ?></td>
          <td><?= $datos->usuario ?></td>
          <td>
            <a href="" data-toggle="modal" data-target="#exampleModal<?= $datos->id_usuario ?>" class=" btn btn-warning btn-sm"><i class=" fa-solid fa-pen-to-square"></i></a>
            <a href="usuario.php?id=<?= $datos->id_usuario ?>" onclick="advertencia(event)" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-arrow-up"></i></a>
          </td>
        </tr>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?= $datos->id_usuario ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content d-flex justify-content-betweer">
              <div class="modal-header">
                <h5 class="modal-title w-100" id="exampleModalLabel">Modificar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" method="POST">
                  <div hidden class="fl-flex-label mb-4 px-2 col-12">
                    <input type="text" placeholder="ID" class="input input__text" name="txtid" value="<?= $datos->id_usuario ?>">
                  </div>
                  <div class="fl-flex-label mb-4 px-2 col-12">
                    <input type="text" placeholder="Nombre" class="input input__text" name="txtnombre" value="<?= $datos->nombre ?>">
                  </div>
                  <div class="fl-flex-label mb-4 px-2 col-12">
                    <input type="text" placeholder="Apellido" class="input input__text" name="txtapellido" value="<?= $datos->apellido ?>">
                  </div>
                  <div class="fl-flex-label mb-4 px-2 col-12">
                    <input type="text" placeholder="Usuario" class="input input__text" name="txtusuario" value="<?= $datos->usuario ?>">
                  </div>
                  <div class="text-right p-2">
                    <a href="usuario.php" class="btn btn-secondary btn-rounded">Atras</a>
                    <button type="submit" value="ok" name="btnmodificar" class="btn btn-primary btn-rounded">Modificar</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
</div>
<?php }
?>


</tbody>
</table>

</dv>
</div>

<?php require('./layout/footer.php'); ?>
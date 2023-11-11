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

  <h4 class="text-center tex-secondary"> REGISTRO DE USUARIOS </h4>

  <?php
  include "../modelo/conexion.php";
  include "../controlador/controlador_registrar_usuario.php"
  
  ?>

  <div class="row">
    <form action="" method="POST">
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
        <input type="text"  placeholder="Nombre" class="input input__text" name="txtnombre">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
        <input type="text"  placeholder="Apellido" class="input input__text" name="txtapellido">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
        <input type="text"  placeholder="Usuario" class="input input__text" name="txtusuario">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
        <input type="password" placeholder="Contraseña" class="input input__text" name="txtpassword">
      </div>
      <div class="text-right p-2">
        <a href="usuario.php" class="btn btn-secondary btn-rounded">Atras</a>
        <button type="submit" value="ok" name="btnregistrar" class="btn btn-primary btn-rounded">Registrar</button>
      </div>
    </form>
  </div>
</div>  
</div>

<?php require('./layout/footer.php'); ?>
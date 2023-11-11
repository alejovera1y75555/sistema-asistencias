<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
  header('location:login/login.php');
}

?>
<style>
  ul li:nth-child(4) .activo {
    background: rgb(11, 150, 214) !important;
  }
</style>

<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>
<div class="page-content">

  <h4 class="text-center tex-secondary"> REGISTRO DE CARGOS </h4>

  <?php
  include '../modelo/conexion.php';
  include "../controlador/controlador_registrar_cargo.php"
    
  ?>

  <div class="row">
    <form action="" method="POST">
      <div class="fl-flex-label mb-4 px-2 col-12">
        <input type="text"  placeholder="Nombre" class="input input__text" name="txtnombre">
      </div>
      
      <div class="text-right p-2">
        <a href="cargo.php" class="btn btn-secondary btn-rounded">Atras</a>
        <button type="submit" value="ok" name="btnregistrar" class="btn btn-primary btn-rounded">Registrar</button>
      </div>
    </form>
  </div>
</div>  
</div>

<?php require('./layout/footer.php'); ?>
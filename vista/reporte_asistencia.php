<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
  header('location:login/login.php');
}

?>

<style>
  ul li:nth-child(1) .activo {
    background: rgb(11, 150, 214) !important;
  }
</style>

<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>
<div class="page-content">

  <h4 class="text-center tex-secondary"> REPORTE DETALLADO </h4>


  <?php
  include "../modelo/conexion.php";
  $sql = $conexion->query("SELECT * FROM empleado");
  ?>

  <form action="fpdf/ReporteAsistenciaFecha.php">
    <input required type="date" name="txtfechainicio" class="input input__text mb-2">
    <input required type="date" name="txtfechafinal" class="input input__text mb-2">
    <select required name="txtempleado" class="input input__select mb-2">
      <option value="todos">Todos los empleados</option>
      <?php
      while ($datos = $sql->fetch_object()) { ?>
        <option value="<?= $datos->id_empleado ?>"><?= $datos->nombre . " " . $datos->apellido ?></option>
      <?php }
      ?>


    </select>
    <button type="submite" name="btngenerar" class="btn btn-primary w-100 p-3">Generar Reporte</button>
  </form>

</div>
</div>

<?php require('./layout/footer.php'); ?>
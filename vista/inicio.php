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

  <h4 class="text-center tex-secondary"> ASISTENCIA DE EMPLEADOS </h4>

  <?php

  include "../modelo/conexion.php";
  include "../controlador/controlador_eliminar_asistencia.php";

  $sql = $conexion->query(" SELECT
    asistencia.id_asistencia,
    asistencia.entrada,
    asistencia.salida,
    empleado.id_empleado,
    empleado.nombre as 'nom_empleado',
    empleado.apellido,
    empleado.cedula,
    empleado.cargo,
    cargo.id_cargo,
    cargo.nombre as 'nom_cargo'
    FROM 
    asistencia
    INNER JOIN empleado ON asistencia.id_empleado = empleado.id_empleado
    INNER JOIN cargo ON empleado.cargo = cargo.id_cargo ");

  ?>
  <div class="text-right mb-2" >
    <a href="fpdf/ReporteAsistencia.php" target="_blank" class="btn btn-success"><i class="fas fa-file-pdf"></i>Generar Reportes</a>
  </div>
  <div class="text-right mb-2" >
    <a href="reporte_asistencia.php" class="btn btn-primary"><i class="fas fa-plus"></i>Reporte Detallado</a>
  </div>
  <table class="table table-bordered table-hover col-12" id="example">
    <thead>
      <tr>
        <td scope="col">ID</td>
        <td scope="col">EMPLEADO</td>
        <!-- td scope="col">CC</td-->
        <td scope="col">CARGO</td>
        <td scope="col">ENTRADA</td>
        <td scope="col">SALIDA</td>
        <td>
        </td>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($datos = $sql->fetch_object()) { ?>
        <tr>
          <td><?= $datos->id_asistencia ?></td>
          <td><?= $datos->nom_empleado . " " . $datos->apellido ?></td>
          <!--td><?= $datos->dni ?></td-->
          <td><?= $datos->nom_cargo ?></td>
          <td><?= $datos->entrada ?></td>
          <td><?= $datos->salida ?></td>
          <td>
            <a href="inicio.php?id=<?= $datos->id_asistencia ?>" onclick="advertencia(event)" class="btn btn-danger"><i class="fa-solid fa-trash-arrow-up"></i></a>
          </td>
        </tr>
      <?php }
      ?>


    </tbody>
  </table>

  </dv>
</div>

<?php require('./layout/footer.php'); ?>
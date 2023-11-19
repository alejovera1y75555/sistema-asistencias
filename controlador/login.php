<?php

session_start();

if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
        $usuario = $_POST["usuario"];
        $password = md5($_POST["password"]);
        $stmt = $conexion->prepare("SELECT * FROM usuario WHERE usuario=? AND password=?");
        $stmt->bind_param("ss", $usuario, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($datos=$result->fetch_object()) {
        $_SESSION["nombre"]=$datos->nombre;
        $_SESSION["apellido"]=$datos->apellido;
        $_SESSION["id"]=$datos->id_usuario;
            header("location:../inicio.php");
        } else {
            echo "<div class='alert alert-danger'>El usuario no existe</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Los campos estan vacios</div>";
    }
}

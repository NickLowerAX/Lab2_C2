<?php
session_start();
include("conexion.php");

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$password'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $_SESSION['usuario'] = $usuario;
    header("Location: dashboard.php");
} else {
    echo "Usuario o contraseña incorrectos";
}
?>

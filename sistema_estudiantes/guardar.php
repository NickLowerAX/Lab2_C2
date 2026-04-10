<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$carrera = $_POST['carrera'];
$correo = $_POST['correo'];

if (empty($nombre) || empty($edad) || empty($carrera) || empty($correo)) {
    echo "Todos los campos son obligatorios";
    exit();
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    echo "Correo no válido";
    exit();
}

$sql = "INSERT INTO estudiantes (nombre, edad, carrera, correo)
        VALUES ('$nombre', '$edad', '$carrera', '$correo')";

$conexion->query($sql);

header("Location: dashboard.php");
?>
<?php
include("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$carrera = $_POST['carrera'];
$correo = $_POST['correo'];

$sql = "UPDATE estudiantes 
        SET nombre='$nombre', edad='$edad', carrera='$carrera', correo='$correo'
        WHERE id=$id";

$conexion->query($sql);

header("Location: dashboard.php");
?>
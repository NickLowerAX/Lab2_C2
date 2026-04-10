<?php
include("conexion.php");

$id = $_GET['id'];

$resultado = $conexion->query("SELECT * FROM estudiantes WHERE id=$id");
$fila = $resultado->fetch_assoc();
?>

<form action="actualizar.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

    <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>"><br>
    <input type="number" name="edad" value="<?php echo $fila['edad']; ?>"><br>
    <input type="text" name="carrera" value="<?php echo $fila['carrera']; ?>"><br>
    <input type="email" name="correo" value="<?php echo $fila['correo']; ?>"><br>

    <button type="submit">Actualizar</button>
</form>

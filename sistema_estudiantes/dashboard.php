<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h2>Bienvenido <?php echo $_SESSION['usuario']; ?></h2>

<a href="logout.php">Cerrar sesión</a>

<hr>

<h3>Registrar estudiante</h3>

<form action="guardar.php" method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required><br><br>
    <input type="number" name="edad" placeholder="Edad" required><br><br>
    <input type="text" name="carrera" placeholder="Carrera" required><br><br>
    <input type="email" name="correo" placeholder="Correo" required><br><br>

    <button type="submit">Guardar</button>
</form>

<hr>

<h3>Lista de estudiantes</h3>

<table border="1">
<tr>
    <th>Nombre</th>
    <th>Edad</th>
    <th>Carrera</th>
    <th>Correo</th>
    <th>Acciones</th>
</tr>

<?php
$resultado = $conexion->query("SELECT * FROM estudiantes");

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>
        <td>{$fila['nombre']}</td>
        <td>{$fila['edad']}</td>
        <td>{$fila['carrera']}</td>
        <td>{$fila['correo']}</td>
        <td>
            <a href='editar.php?id={$fila['id']}'>Editar</a>
            <a href='eliminar.php?id={$fila['id']}'>Eliminar</a>
        </td>
      </tr>";
}
?>

</table>

</body>
</html>
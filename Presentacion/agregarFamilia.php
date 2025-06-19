<?php
require_once '../Logica/LFamilias.php';
require_once '../Entidades/Familia.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agregar'])) {
    $nombre = $_POST['nombres'];
    $descripcion = $_POST['descripcion'];

    $familia = new Familia(null, $nombre, $descripcion);
    $log = new LFamilia();
    $log->guardar($familia);

    echo "<script>alert('Familia agregada correctamente'); window.location.href='CargarFamilia.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Familia</title>
</head>
<body>
    <h2>Agregar Nueva Familia</h2>
    <form method="POST">
        <label for="nombres">Nombre:</label><br>
        <input type="text" name="nombres" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" name="agregar" value="Agregar">
        <a href="CargarFamilia.php"><button type="button">Cancelar</button></a>
    </form>
</body>
</html>

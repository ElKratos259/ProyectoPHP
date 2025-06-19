<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Familias</title>
</head>
<body>
    <h2>Familias</h2>
    <hr>
    <a href="agregarFamilia.php"><button type="button">Agregar Familia</button></a>

    <div>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require '../Logica/LFamilias.php';
                $log = new LFamilia();
                foreach ($log->cargar() as $familia) {
                ?>
                <tr>
                    <td><?= $familia->getIdfamilia() ?></td>
                    <td><?= $familia->getNombres() ?></td>
                    <td><?= $familia->getDescripcion() ?></td>
                    <td>
                        <form method="GET" action="modificarfamilia.php" style="display:inline;">
                            <input type="hidden" name="idfamilia" value="<?= $familia->getIdfamilia() ?>">
                            <button type="submit">Modificar</button>
                        </form>

                        <form method="POST" action="eliminarfamilia.php" onsubmit="return confirm('¿Estás seguro de borrar?');" style="display:inline;">
                            <input type="hidden" name="idfamilia" value="<?= $familia->getIdfamilia() ?>">
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>


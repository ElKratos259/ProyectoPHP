<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <table border="1">
        <?php
        require '../Logica/LFamilias.php';
        $log = new LFamilia();
        foreach($log->cargar() as $familia){
        ?>
        <tbody>
            
            <tr>
                <td><?= $familia->getIdFamilia() ?></td>
                <td><?= $familia->getNombres() ?></td>
                <td><?= $familia->getDescripcion() ?></td>
                <td>
                    <form method="POST" action="eliminarfamilia.php" onsubmit="return confirm('¿Estás seguro de borrar?');">
                        <input type="hidden" name="idfamilia" value="<?= $familia->getIdFamilia() ?>">
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

<?php
require_once '../Logica/LFamilias.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idfamilia'])) {
    $id = $_POST['idfamilia'];
    $log = new LFamilia();
    $log->eliminar($id);
}

header('Location: CargarFamilia.php');
exit;
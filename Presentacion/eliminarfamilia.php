<?php
require_once '../Logica/LFamilias.php';
require_once '../Entidades/Familia.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idfamilia'])) {
    $id = $_POST['idfamilia'];
    
    $familia = new Familia($id);
    
    $log = new LFamilia();
    $log->eliminar($familia);
}

header('Location: CargarFamilia.php');
exit;
?>

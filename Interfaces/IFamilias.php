<?php
require_once '../Entidades/Familia.php';
interface IFamilias{
    public function guardar(Familia $familia);
    public function cargar(): array;
    public function actualizar(Familia $familia);
    public function eliminar(Familia $familia);
    }
?>
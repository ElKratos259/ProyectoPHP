<?php
require_once '../Entidades/Familia.php';
interface IFamilias{
    public function guardar(Familia $familia);
    public function cargar(): array;
    public function modificar(Familia $familia);
    public function eliminar(Familia $familia);
    }
?>
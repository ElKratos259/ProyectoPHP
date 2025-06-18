<?php
require_once '../Entidades/Familia.php';
interface IFamilias{
    public function Guardar(Familia $familia);
    public function Cargar(): array;
    public function Actualizar(Familia $familia);
    public function Eliminar(Familia $familia);

    }
?>
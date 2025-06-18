<?php
interface IFamilia {
    public function listar();
    public function registrar(Familia $familia);
    public function modificar(Familia $familia);
    public function eliminar($idfamilia);
}
?>

<?php
class Familia {
    private $idfamilia;
    private $nombres;
    private $descripcion;

    public function __construct($idfamilia = null, $nombres = '', $descripcion = '') {
        $this->idfamilia = $idfamilia;
        $this->nombres = $nombres;
        $this->descripcion = $descripcion;
    }

    public function getIdfamilia() {
        return $this->idfamilia;
    }

    public function setIdfamilia($idfamilia) {
        $this->idfamilia = $idfamilia;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
}
?>

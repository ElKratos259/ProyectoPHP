<?php
class Familia {
    // Atributos privados
    private $idfamilia;
    private $nombres;
    private $descripcion;

    // Constructor
    public function __construct($idfamilia = null, $nombres = '', $descripcion = '') {
        $this->idfamilia = $idfamilia;
        $this->nombres = $nombres;
        $this->descripcion = $descripcion;
    }

    // Getter y Setter para idfamilia
    public function getIdfamilia() {
        return $this->idfamilia;
    }

    public function setIdfamilia($idfamilia) {
        $this->idfamilia = $idfamilia;
    }

    // Getter y Setter para nombres
    public function getNombres() {
        return $this->nombres;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    // Getter y Setter para descripcion
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
}
?>

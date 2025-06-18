<?php 
require_once '../Datos/DB.php';
require_once '../Entidades/Familia.php';
require_once '../Interfaces/IFamilia.php';

class LFamilia implements IFamilia {
    private $conexion;

    public function __construct() {
        $this->conexion = DB::conectar();
    }

    public function cargar(Familias $familia) {
        $stmt = $this->conexion->prepare("SELECT * FROM familias");
        return $stmt->execute([
            $familia->getIdfamilia(),
            $familia->getNombres(),
            $familia->getDescripcion()
        ]);
    }

    public function guardar(Familias $familia) {
        $stmt = $this->conexion->prepare("INSERT INTO familias (nombres, descripcion) VALUES (?, ?)");
        return $stmt->execute([
            $familia->getNombres(),
            $familia->getDescripcion()
        ]);
    }

    public function modificar(Familias $familia) {
        $stmt = $this->conexion->prepare("UPDATE familias SET nombres = ?, descripcion = ? WHERE idfamilia = ?");
        return $stmt->execute([
            $familia->getNombres(),
            $familia->getDescripcion(),
            $familia->getIdfamilia()
        ]);
    }

    public function eliminar($idfamilia) {
        $stmt = $this->conexion->prepare("DELETE FROM familias WHERE idfamilia = ?");
        return $stmt->execute([$idfamilia]);
    }
}
?>

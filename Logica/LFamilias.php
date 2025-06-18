<?php 
require_once '../Datos/DB.php';
require_once '../Entidades/Familia.php';
require_once '../Interfaces/IFamilias.php';

class LFamilia implements IFamilias {
    private $conexion;

    public function __construct() {
        $this->conexion = DB::conectar();
    }

    public function cargar(): array {
        $stmt = $this->conexion->prepare("SELECT * FROM familias");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar(Familia $familia) {
        $stmt = $this->conexion->prepare("INSERT INTO familias (nombres, descripcion) VALUES (?, ?)");
        return $stmt->execute([
            $familia->getNombres(),
            $familia->getDescripcion()
        ]);
    }

    public function modificar(Familia $familia) {
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

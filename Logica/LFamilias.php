<?php 
require_once '../Datos/DB.php';
require_once '../Entidades/Familia.php';
require_once '../Interfaces/IFamilias.php';

class LFamilia implements IFamilias {
    private $conexion;

    public function __construct() {
        $this->conexion = DB::conectar();
    }

    public function guardar(Familia $familia) {
        $stmt = $this->conexion->prepare("INSERT INTO familias (nombres, descripcion) VALUES (?, ?)");
        $stmt->execute([
            $familia->getNombres(),
            $familia->getDescripcion()
        ]);
    }

    public function Cargar(): array {
        $stmt = $this->conexion->query("SELECT * FROM familias");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Actualizar(Familia $familia) {
        $stmt = $this->conexion->prepare("UPDATE familias SET nombres = ?, descripcion = ? WHERE idfamilia = ?");
        $stmt->execute([
            $familia->getNombres(),
            $familia->getDescripcion(),
            $familia->getIdfamilia()
        ]);
    }

    public function Eliminar(Familia $familia) {
        $stmt = $this->conexion->prepare("DELETE FROM familias WHERE idfamilia = ?");
        $stmt->execute([$familia->getIdfamilia()]);
    }
}

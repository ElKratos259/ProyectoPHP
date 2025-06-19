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

    public function cargar(): array {
        $stmt = $this->conexion->query("SELECT * FROM familias");
        $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $familias = [];

        foreach ($filas as $fila) {
            $familia = new Familia(
                $fila['idfamilia'],
                $fila['nombres'],
                $fila['descripcion']
            );
            $familias[] = $familia;
        }

        return $familias;
    }

    public function actualizar(Familia $familia) {
        $stmt = $this->conexion->prepare("UPDATE familias SET nombres = ?, descripcion = ? WHERE idfamilia = ?");
        $stmt->execute([
            $familia->getNombres(),
            $familia->getDescripcion(),
            $familia->getIdfamilia()
        ]);
    }

    public function eliminar(Familia $familia) {
        $stmt = $this->conexion->prepare("DELETE FROM familias WHERE idfamilia = ?");
        $stmt->execute([$familia->getIdfamilia()]);
    }
}
?>
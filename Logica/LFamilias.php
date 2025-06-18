<?php
// Incluir archivos necesarios
require_once '../DATOS/DB.php';
require_once '../ENTIDADES/Familia.php';
require_once '../INTERFACES/IFamilia.php';

class LFamilia implements IFamilia {
    private $conexion;

    public function __construct() {
        $this->conexion = DB::conectar();
    }

    // Listar todas las familias
    public function listar() {
        $stmt = $this->conexion->prepare("SELECT * FROM familias");
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $lista = [];
        foreach ($resultados as $row) {
            $familia = new Familia($row['idfamilia'], $row['nombres'], $row['descripcion']);
            $lista[] = $familia;
        }
        return $lista;
    }

    // Registrar nueva familia
    public function registrar(Familia $familia) {
        $stmt = $this->conexion->prepare("INSERT INTO familias (nombres, descripcion) VALUES (?, ?)");
        return $stmt->execute([
            $familia->getNombres(),
            $familia->getDescripcion()
        ]);
    }

    // Modificar familia existente
    public function modificar(Familia $familia) {
        $stmt = $this->conexion->prepare("UPDATE familias SET nombres = ?, descripcion = ? WHERE idfamilia = ?");
        return $stmt->execute([
            $familia->getNombres(),
            $familia->getDescripcion(),
            $familia->getIdfamilia()
        ]);
    }

    // Eliminar familia por ID
    public function eliminar($idfamilia) {
        $stmt = $this->conexion->prepare("DELETE FROM familias WHERE idfamilia = ?");
        return $stmt->execute([$idfamilia]);
    }
}
?>

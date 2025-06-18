<?php 
require_once '../Datos/DB.php';
require_once '../Entidades/Familia.php';
require_once '../Interfaces/IFamilia.php';

class LFamilia implements IFamilia {
    private $conexion;

    public function __construct() {
        $this->conexion = DB::conectar();
    }

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

    public function cargar(Familia $familia) {
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

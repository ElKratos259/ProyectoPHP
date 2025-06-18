<?php
class DB {
    public static function conectar() {
        try {
            $conexion = new PDO("pgsql:host=localhost;dbname=familiasdb", "postgres", "123456");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>

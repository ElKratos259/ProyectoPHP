-- SCRIPT PARA POSTGRESQL
CREATE TABLE familias (
    idfamilia SERIAL PRIMARY KEY,
    nombres VARCHAR(50),
    descripcion VARCHAR(100)
);

INSERT INTO familias (nombres, descripcion) VALUES
('Pérez', 'Familia tradicional con cinco hijos.'),
('Rodríguez', 'Familia extendida con abuelos viviendo en casa.');

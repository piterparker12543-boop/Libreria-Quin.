USE libreria_quin_db;

-- ==========================================
-- 1. CREATE (Insertar datos iniciales)
-- ==========================================

-- Inserciones en tablas maestras (Roles y Categorías)
INSERT INTO roles (nombre_rol) VALUES ('Administrador'), ('Cliente');

INSERT INTO categorias (nombre_categoria) VALUES ('Escolar'), ('Librería Artística');

-- Inserciones en la tabla principal (Productos) vinculando claves foráneas
INSERT INTO productos (nombre, descripcion, precio, stock, id_categoria) 
VALUES 
('Cuaderno A4 Rayado 100 Hojas', 'Tapa dura diseño exclusivo Quin', 2500.00, 45, 1),
('Set de Lápices de Dibujo Profesional x12', 'Graduación 9B a 2H', 6200.00, 20, 2);


-- ==========================================
-- 2. READ (Consultas y Uniones)
-- ==========================================

-- Consulta SELECT con WHERE y ORDER BY
SELECT nombre, precio, stock 
FROM productos 
WHERE precio > 2000 
ORDER BY precio DESC;

-- Consulta SELECT con INNER JOIN (Uniendo productos con sus categorías)
p.nombre AS producto, 
    p.precio, 
    c.nombre_categoria 
FROM productos p
INNER JOIN categorias c ON p.id_categoria = c.id_categoria;


-- ==========================================
-- 3. UPDATE (Actualización de registros)
-- ==========================================

-- Modificar el precio de un producto específico usando estrictamente WHERE
UPDATE productos 
SET precio = 2800.00, stock = 40 
WHERE id_producto = 1;


-- ==========================================
-- 4. DELETE (Eliminación de registros)
-- ==========================================

-- Dar de baja un registro de prueba utilizando la cláusula WHERE
DELETE FROM productos 
WHERE id_producto = 2;
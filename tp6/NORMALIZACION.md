# Normalización del Proyecto Integrador - Librería Quin

## 1. Entidad / Tabla Principal sin Normalizar (Forma No Normalizada - FNN)
Un registro hipotético de cómo se guardaría la información inicial del sistema con datos redundantes y campos multivalorados en una sola tabla plana:

| id_producto | nombre_producto | descripcion | categoria_info | etiquetas | proveedor_info | stock_sucursal |
| :--- | :--- | :--- | :--- | :--- | :--- | :--- |
| 1 | Cuaderno A4 Rayado | Tapa dura 100 hojas | Librería > Escolares > Cuadernos | oferta, escolar, nuevo | Distribuidora Central (Tel: 387400000, Dir: San Martín 123) | Salta: 45, Centro: 12 |

---

## 2. Proceso de Normalización

* **Primera Forma Normal (1FN):** 
  Se eliminan los grupos repetitivos o listas de datos en un solo campo (como `etiquetas` o `stock_sucursal` mezclados). Cada celda contiene un valor atómico y se evitan columnas compuestas.
* **Segunda Forma Normal (2FN):** 
  Se parte de la 1FN asegurando que toda columna que no sea clave dependa funcionalmente de toda la clave primaria. Se separan entidades que posean dependencias parciales (por ejemplo, desglosando los datos del proveedor o de las categorías en tablas independientes).
* **Tercera Forma Normal (3FN):** 
  Se eliminan las dependencias transitivas. Los atributos que dependen de otros atributos que no son clave principal se extraen a sus propias tablas maestras normalizadas.

---

## 3. Diagrama / Listado de Tablas Resultante (Modelo Relacional)

A continuación se listan las tablas normalizadas del sistema indicando sus Claves Primarias (**PK**) y Claves Foráneas (**FK**):

* **`roles`**
  * `id_rol` (PK)
  * `nombre_rol`

* **`usuarios`**
  * `id_usuario` (PK)
  * `email`
  * `password`
  * `nombre`
  * `id_rol` (FK -> `roles.id_rol`)
  * `created_at`, `updated_at`

* **`categorias`**
  * `id_categoria` (PK)
  * `nombre_categoria`

* **`productos`** (Tabla Principal de Negocio)
  * `id_producto` (PK)
  * `nombre`
  * `descripcion`
  * `precio`
  * `stock`
  * `id_categoria` (FK -> `categorias.id_categoria`)
  * `created_at`, `updated_at`

* **`detalle_pedidos`** (Tabla de Relación N:M)
  * `id_detalle` (PK)
  * `id_producto` (FK -> `productos.id_producto`)
  * `cantidad`
  * `precio_unitario`
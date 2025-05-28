CREATE DATABASE vestasdemo_db;
USE vestasdemo_db;
CREATE TABLE clientes 
(
	id_cliente INT PRIMARY KEY AUTO_INCREMENT,
	nombre VARCHAR(50)NOT NULL,
	email VARCHAR(50),
	phone VARCHAR(20)
);
INSERT INTO clientes (nombre, email, phone) VALUES ('yudith','yuduth@gmail.com','09377832');
SELECT * FROM clientes;

CREATE TABLE proveedores
(
	id_proveedor INT PRIMARY KEY AUTO_INCREMENT,
	nombre VARCHAR (50),
	ruc VARCHAR (15)
);


INSERT INTO proveedores (nombre, ruc)VALUES ('YHONAM','20708569491'),('SARA','2076543213');
SELECT * FROM proveedores;

ALTER TABLE clientes ADD COLUMN 
DESCRIBE clientes;
CREATE TABLE ventas 
(
	id_venta INT PRIMARY KEY AUTO_INCREMENT,
	id_proveedor INT,
	id_cliente INT,
	fecha  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	descripcion VARCHAR (100)
);

ALTER TABLE ventas
ADD CONSTRAINT fk_clien_venta
FOREIGN KEY (id_cliente) REFERENCES clientes (id_cliente);


INSERT INTO ventas
(id_proveedor,id_cliente,descripcion)
VALUES
(1,1,'venta de ropas'),
(1,2,'venta de trajes'),
(2,1,'venta de bebidas');
SELECT * FROM ventas;

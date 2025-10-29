CREATE DATABASE IF NOT EXISTS casa_del_maestro CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE casa_del_maestro;



-- Tabla de usuarios

CREATE TABLE usuarios (

  id INT AUTO_INCREMENT PRIMARY KEY,

  nombre VARCHAR(100) NOT NULL,

  correo VARCHAR(100) NOT NULL UNIQUE,

  contrasena VARCHAR(255) NOT NULL,

  rol ENUM('cliente', 'administrador') DEFAULT 'cliente',

  fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);



-- Tabla de productos

CREATE TABLE productos (

  id INT AUTO_INCREMENT PRIMARY KEY,

  nombre VARCHAR(150) NOT NULL,

  descripcion TEXT,

  precio DECIMAL(10,2) NOT NULL,

  imagen_url VARCHAR(255),

  categoria VARCHAR(100),

  stock INT DEFAULT 0,

  fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);



-- Tabla de carrito (productos agregados por cada usuario)

CREATE TABLE carrito (

  id INT AUTO_INCREMENT PRIMARY KEY,

  id_usuario INT NOT NULL,

  id_producto INT NOT NULL,

  cantidad INT DEFAULT 1,

  fecha_agregado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

  FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE,

  FOREIGN KEY (id_producto) REFERENCES productos(id) ON DELETE CASCADE

);



-- Tabla de pedidos

CREATE TABLE pedidos (

  id INT AUTO_INCREMENT PRIMARY KEY,

  id_usuario INT NOT NULL,

  total DECIMAL(10,2) NOT NULL,

  estado ENUM('pendiente', 'pagado', 'enviado', 'entregado', 'cancelado') DEFAULT 'pendiente',

  fecha_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

  FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE

);



-- Tabla detalle de pedido

CREATE TABLE pedido_detalle (

  id INT AUTO_INCREMENT PRIMARY KEY,

  id_pedido INT NOT NULL,

  id_producto INT NOT NULL,

  cantidad INT NOT NULL,

  precio_unitario DECIMAL(10,2) NOT NULL,

  FOREIGN KEY (id_pedido) REFERENCES pedidos(id) ON DELETE CASCADE,

  FOREIGN KEY (id_producto) REFERENCES productos(id) ON DELETE CASCADE

);



-- Insertar un usuario administrador por defecto

INSERT INTO usuarios (nombre, correo, contrasena, rol)

VALUES ('Administrador', 'admin@maestro.com', SHA2('admin123', 256), 'administrador');



-- Insertar algunos productos de ejemplo

INSERT INTO productos (nombre, descripcion, precio, imagen_url, categoria, stock) VALUES

('Set de Ollas Premium', 'Acero inoxidable de alta calidad con fondo térmico tricapa para distribución uniforme del calor.', 699.00, 'https://previews.123rf.com/images/urfingus/urfingus1710/urfingus171000302/87756183-set-of-saucepans-isolated-on-white-background-3d-illustration.jpg', 'Cocina', 20),

('Sartén Antiadherente', 'Revestimiento cerámico de grado profesional, resistente a altas temperaturas y libre de PFOA.', 168.03, 'https://http2.mlstatic.com/D_NQ_NP_834202-MPE69761501236_062023-O-juego-de-sartenes-antiadherentes-de-3-piezas-de-8-10-y.webp', 'Cocina', 50),

('Set de Cuchillos Profesional', 'Acero alemán forjado con mango ergonómico, incluye bloque de madera de bambú.', 199.90, 'https://www.inche.com.pe/wp-content/uploads/2022/10/123804-05.jpg', 'Cocina', 30);




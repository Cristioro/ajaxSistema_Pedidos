CREATE DATABASE sistema_pedidos;
USE sistema_pedidos;

CREATE TABLE Usuario (
    documento INT PRIMARY KEY,
    nombre VARCHAR(100),
    direccion VARCHAR(255),
    correo VARCHAR(100),
    contrasena VARCHAR(255),
    id_pedido INT,
    admin TINYINT(1) DEFAULT 0,
    FOREIGN KEY (id_pedido) REFERENCES Pedido(id_pedido)
);

CREATE TABLE Pedido (
    id_pedido INT PRIMARY KEY AUTO_INCREMENT,
    producto VARCHAR(100),
    valor_total DECIMAL(10, 2),
    cantidad INT,
    id_producto INT,
    FOREIGN KEY (id_producto) REFERENCES producto(id_producto)
);

CREATE TABLE producto (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    precio DECIMAL(10, 2),
    cantidad INT
);

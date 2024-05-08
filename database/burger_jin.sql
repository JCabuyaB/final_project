CREATE DATABASE IF NOT EXISTS burger_jin;
USE burger_jin;

-- del usuario
CREATE TABLE tbl_roles(
    id tinyint auto_increment not null,
    nombre varchar(70) not null,
    CONSTRAINT pk_roles PRIMARY KEY(id)
)ENGINE = InnoDB;

CREATE TABLE tbl_usuarios(
    id int auto_increment not null,
    id_rol tinyint not null,
    nombre varchar(100) not null,
    apellidos varchar(100),
    correo varchar(255) not null,
    user_pass varchar(255) not null,
    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT fk_rol FOREIGN KEY(id_rol) REFERENCES tbl_roles(id),
    CONSTRAINT uq_correo UNIQUE(correo)
)ENGINE = InnoDB;

CREATE TABLE tbl_pedidos(
    cod_pedido bigint auto_increment not null,
    id_usuario int not null,
    departamento varchar(150) not null,
    ciudad varchar(150) not null,
    direccion varchar(255) not null,
    valor_total decimal(7,2) not null,
    estado varchar(50) not null,
    fecha date,
    hora time,
    CONSTRAINT pk_pedido PRIMARY KEY(cod_pedido),
    CONSTRAINT fk_usuario FOREIGN KEY(id_usuario) REFERENCES tbl_usuarios(id)
)ENGINE = InnoDB;

-- de los productos
CREATE TABLE tbl_categorias(
    id tinyint auto_increment not null,
    nombre varchar(130) not null,
    CONSTRAINT pk_categoria PRIMARY KEY(id)
)ENGINE = InnoDB;

CREATE TABLE tbl_productos(
    id smallint auto_increment not null,
    id_categoria tinyint not null,
    nombre varchar(150),
    imagen varchar(255) not null,
    descripcion mediumtext,
    precio decimal(6,2),
    calorias smallint not null,
    CONSTRAINT pk_productos PRIMARY KEY(id),
    CONSTRAINT fk_categoria FOREIGN KEY(id_categoria) REFERENCES tbl_categorias(id)
)ENGINE = InnoDB;

-- detalle 
CREATE TABLE tbl_detalle_pedido(
    id bigint auto_increment not null,
    id_pedido bigint not null,
    id_prod smallint not null,
    cantidad smallint not null,
    CONSTRAINT pk_detalle_pedido PRIMARY KEY(id),
    CONSTRAINT fk_pedido FOREIGN KEY(id_pedido) REFERENCES tbl_pedidos(cod_pedido),
    CONSTRAINT fk_producto FOREIGN KEY(id_prod) REFERENCES tbl_productos(id)
)ENGINE = InnoDB;
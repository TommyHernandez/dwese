create table producto(
    id int primary key not null auto_increment,
    nombre varchar(25) not null,
    descripcion varchar(100),
    precio decimal not null,
    iva int

);
create table venta(
    id int not null primary key auto_increment,
    fecha date,
    hora time,
    pago ENUM('si', 'no', 'espera'),
    direnvio varchar(35) not null,
    nombre varchar(20)
);
create table detalleventa (
    id int primary key auto_increment,
    idventa int not null,
    idproducto int not null,
    cantidad int,
    precio int not null,
    iva int,
  FOREIGN KEY (idventa) REFERENCES venta(id) on update cascade on delete NO ACTION,
  FOREIGN KEY (idproducto) REFERENCES producto(id) on update cascade on delete NO ACTION
);
create table paypal(
    id int primary key auto_increment,
    item_name varchar(20),
    verificado varchar(15),
    gross double,
    txn_id int,
    payer_email varchar(30),
    resto varchar(200)
);

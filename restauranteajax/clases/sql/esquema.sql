create database restaurante;
use restaurante;

grant all on restaurante.* to restaurante@localhost identified by "restaurante2015";

flush privileges;

create table usuario (
  login varchar(30) not null primary key,
  clave varchar(40) not null,
  nombre varchar(30) not null,
  apellidos varchar(60) not null,
  email varchar(40) not null,
  fechaalta date not null,
  isactivo tinyint(1) not null default 0,
  isroot tinyint(1) not null default 0,
  rol enum('administrador','usuario') not null default 'usuario',
  fechalogin datetime
) engine=innodb charset=utf8 collate=utf8_unicode_ci;
create table platos (
  id int primary key auto_increment,
  nombre varchar(30) not null,
  descripcion varchar(140) ,
  precio decimal not null
);
create table menu (
  id int primary key auto_increment,
  nombre varchar(30) not null,
  p1 int not null,
  p2 int not null,
  p3 int not null,
  activo boolean,
  FOREIGN KEY (p1) REFERENCES platos(id) on update cascade on delete NO ACTION,
  FOREIGN KEY (p2) REFERENCES platos(id) on update cascade on delete NO ACTION,
  FOREIGN KEY (p3) REFERENCES platos(id) on update cascade on delete NO ACTION
);
create table fotos (
  id int primary key auto_increment,
  idp int not null,
  ruta varchar(40) not null,
  FOREIGN KEY (idp) REFERENCES platos(id) on update cascade on delete cascade
);
INSERT INTO `restaurante`.`usuario` (`login`, `clave`, `nombre`, `apellidos`, `email`, `fechaalta`, `isactivo`, `isroot`, `rol`, `fechalogin`) VALUES ('admin', 'admin', 'Administrador', 'Le restaurant', 'admin@lerestaurant.com', '2015-02-01', '1', '1', 'administrador', NULL);
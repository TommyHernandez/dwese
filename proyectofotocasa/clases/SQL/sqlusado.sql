create table imagenes (
    	id int primary key,
    	idinmueble int,
    	ruta varchar(40),
    	CONSTRAINT FOREIGN KEY (idinmueble) REFERENCES inmueble (id) ON DELETE CASCADE ON UPDATE CASCADE
    
    )
ALTER TABLE `imagenes` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;
INSERT INTO `inmocasa`.`usuario` (`login`, `clave`, `nombre`, `apellidos`, `email`, `fechaalta`, `isactive`, `isroot`, `rol`, `fechalogin`) VALUES ('revisor', 'revisor123', 'Revisor', 'de Casas', 'revisor@miserver.net', '2014-12-06', '1', '1', 'administrador', NULL);

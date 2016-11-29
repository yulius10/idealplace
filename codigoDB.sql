create database idealplace;
use idealplace;

CREATE TABLE tipoNegocio (idtipoNegocio INTEGER NOT NULL AUTO_INCREMENT,descripcion TEXT NOT NULL,PRIMARY KEY(idtipoNegocio));
CREATE TABLE tipoLugar (idtipoLugar INTEGER NOT NULL AUTO_INCREMENT,descripcionLugar TEXT NOT NULL,PRIMARY KEY(idtipoLugar));
CREATE TABLE ubicaciones (idubicaciones INTEGER NOT NULL AUTO_INCREMENT,lugares VARCHAR(150) NOT NULL,PRIMARY KEY(idubicaciones));
CREATE TABLE usuario (idusuario INTEGER NOT NULL AUTO_INCREMENT, nombre VARCHAR(150) NOT NULL,apellido VARCHAR(150) NOT NULL,acceso VARCHAR(150) NOT NULL,usuario VARCHAR(150) NOT NULL,contrasena VARCHAR(150) NOT NULL,correo VARCHAR(150) NOT NULL,PRIMARY KEY(idusuario));
CREATE TABLE localidad (idlocalidad INTEGER NOT NULL AUTO_INCREMENT,localidad VARCHAR(150) NOT NULL,PRIMARY KEY(idlocalidad));
CREATE TABLE contactenos (idcontactenos INTEGER NOT NULL AUTO_INCREMENT,usuario_idusuario INTEGER NOT NULL,asunto VARCHAR(150) NOT NULL,mensaje TEXT NOT NULL,fecha DATE NOT NULL,PRIMARY KEY(idcontactenos),FOREIGN KEY(usuario_idusuario)REFERENCES usuario(idusuario));
CREATE TABLE numeroCelulares (idnumeroCelulares INTEGER NOT NULL AUTO_INCREMENT,usuario_idusuario INTEGER NOT NULL,celulares VARCHAR(150) NOT NULL,PRIMARY KEY(idnumeroCelulares),FOREIGN KEY(usuario_idusuario)REFERENCES usuario(idusuario));
CREATE TABLE lugaresPublicados (idlugaresPublicados INTEGER NOT NULL AUTO_INCREMENT,localidad_idlocalidad INTEGER NOT NULL,ubicaciones_idubicaciones INTEGER NOT NULL,usuario_idusuario INTEGER NOT NULL,tipoNegocio_idtipoNegocio INTEGER NOT NULL,tipoLugar_idtipoLugar INTEGER NOT NULL,estrato INTEGER NOT NULL,estado VARCHAR(1) NOT NULL,fecha DATETIME NOT NULL,cantHabitaciones INTEGER NOT NULL,cantBanos INTEGER NOT NULL,cocina VARCHAR(150) NOT NULL,metroCuadrado INTEGER NOT NULL,valor INTEGER NOT NULL,direccion VARCHAR(20) NOT NULL,urlFoto VARCHAR(255) NOT NULL,accesoInternet VARCHAR(20) NOT NULL,servicios VARCHAR(20) NOT NULL,garaje VARCHAR(20) NOT NULL,razonDeshabilitacion VARCHAR(150) NOT NULL,PRIMARY KEY(idlugaresPublicados, localidad_idlocalidad, ubicaciones_idubicaciones),FOREIGN KEY(tipoLugar_idtipoLugar)REFERENCES tipoLugar(idtipoLugar),FOREIGN KEY(tipoNegocio_idtipoNegocio)REFERENCES tipoNegocio(idtipoNegocio),FOREIGN KEY(localidad_idlocalidad)REFERENCES localidad(idlocalidad),FOREIGN KEY(ubicaciones_idubicaciones)REFERENCES ubicaciones(idubicaciones),FOREIGN KEY(usuario_idusuario)REFERENCES usuario(idusuario));

insert into localidad (localidad) values ("Ninguna");
insert into localidad (localidad) values ("Usaquen");
insert into localidad (localidad) values ("Chapinero");
insert into localidad (localidad) values ("Santa Fe");
insert into localidad (localidad) values ("San Cristobal");
insert into localidad (localidad) values ("Usme");
insert into localidad (localidad) values ("Tunjuelito");
insert into localidad (localidad) values ("Bosa");
insert into localidad (localidad) values ("Kennedy");
insert into localidad (localidad) values ("Fontibon");
insert into localidad (localidad) values ("Engativa");
insert into localidad (localidad) values ("Suba");
insert into localidad (localidad) values ("Barrios Unidos");
insert into localidad (localidad) values ("Teusaquillo");
insert into localidad (localidad) values ("Los Martires");
insert into localidad (localidad) values ("Antonio Narino");
insert into localidad (localidad) values ("Puente Aranda");
insert into localidad (localidad) values ("La Candelaria");
insert into localidad (localidad) values ("Rafael Uribe Uribe");
insert into localidad (localidad) values ("Ciudad Bolivar");
insert into localidad (localidad) values ("Sumapaz");

insert into ubicaciones (lugares) values ("Bogota");
insert into ubicaciones (lugares) values ("Calera");
insert into ubicaciones (lugares) values ("Sopo");
insert into ubicaciones (lugares) values ("Chia");
insert into ubicaciones (lugares) values ("Guatavita");
insert into ubicaciones (lugares) values ("Choachi");

insert into tipoLugar (descripcionLugar) values ("casa");
insert into tipoLugar (descripcionLugar) values ("apartamento");
insert into tipoLugar (descripcionLugar) values ("aparta-estudio");

insert into tipoNegocio (descripcion) values ("Venderlo");
insert into tipoNegocio (descripcion) values ("Arrendarlo");

insert into usuario (nombre,apellido,acceso,usuario,contrasena,correo) values("Felipe","Gomez","Administrador","yulius","123456789","feligomez160@gmail.com");
insert into usuario (nombre,apellido,acceso,usuario,contrasena,correo) values("Oscar","Velandia","Administrador","osvel","123456789","osvel@gmail.com");
insert into usuario (nombre,apellido,acceso,usuario,contrasena,correo) values("Andres","Lopez","Usuario","lopez","123456789","alopez@gmail.com");
insert into usuario (nombre,apellido,acceso,usuario,contrasena,correo) values("Juan","Martinez","Usuario","Martinez","123456789","juMatinez@gmail.com");
insert into usuario (nombre,apellido,acceso,usuario,contrasena,correo) values("Desconocido","Desconocido","Ninguno","Ninguno","Ninguno");

insert into numeroCelulares (usuario_idusuario,celulares) values (1,"3112341232");
insert into numeroCelulares (usuario_idusuario,celulares) values (1,"3091234567");
insert into numeroCelulares (usuario_idusuario,celulares) values (2,"3091234567");
insert into numeroCelulares (usuario_idusuario,celulares) values (2,"3091234567");
insert into numeroCelulares (usuario_idusuario,celulares) values (3,"3121233221");
insert into numeroCelulares (usuario_idusuario,celulares) values (3,"3091234567");
insert into numeroCelulares (usuario_idusuario,celulares) values (4,"3434212390");
insert into numeroCelulares (usuario_idusuario,celulares) values (4,"3091234567");

insert into contactenos (usuario_idusuario,asunto,mensaje,fecha) values (1,'comentario','uso de la aplicacion','09-09-2013');
insert into contactenos (usuario_idusuario,asunto,mensaje,fecha) values (2,'comentario','uso de la aplicacion','09-09-2013');
insert into contactenos (usuario_idusuario,asunto,mensaje,fecha) values (3,'comentario','uso de la aplicacion','09-09-2013');
insert into contactenos (usuario_idusuario,asunto,mensaje,fecha) values (4,'comentario','uso de la aplicacion','09-09-2013');

insert into lugaresPublicados (localidad_idlocalidad,ubicaciones_idubicaciones,tipoNegocio_idtipoNegocio,tipoLugar_idtipoLugar,usuario_idusuario,estrato,estado,fecha,cantHabitaciones,cantBanos,cocina,metroCuadrado,valor,direccion,urlFoto,accesoInternet,servicios,garaje,razonDeshabilitacion) values (11,1,1,1,1,5,'A','09-09-2016 13:26:19',4,4,'Si','130',520000000,'137A Av. Boyaca','Ninguna','No aplica','No aplica','Si','Inactivo');
insert into lugaresPublicados (localidad_idlocalidad,ubicaciones_idubicaciones,tipoNegocio_idtipoNegocio,tipoLugar_idtipoLugar,usuario_idusuario,estrato,estado,fecha,cantHabitaciones,cantBanos,cocina,metroCuadrado,valor,direccion,urlFoto,accesoInternet,servicios,garaje,razonDeshabilitacion) values (10,1,1,1,1,2,'A','09-09-2016 13:26:19',3,2,'Si','83',193900000,'calle 64d transversal 112c','Ninguna','No aplica','No aplica','Si','Inactivo');
insert into lugaresPublicados (localidad_idlocalidad,ubicaciones_idubicaciones,tipoNegocio_idtipoNegocio,tipoLugar_idtipoLugar,usuario_idusuario,estrato,estado,fecha,cantHabitaciones,cantBanos,cocina,metroCuadrado,valor,direccion,urlFoto,accesoInternet,servicios,garaje,razonDeshabilitacion) values (11,1,1,2,1,4,'A','09-09-2016 13:26:19',3,3,'Si','85,5',471472000,'calle 153 No 73-32','Ninguna','No aplica','No aplica','Si','Inactivo');
insert into lugaresPublicados (localidad_idlocalidad,ubicaciones_idubicaciones,tipoNegocio_idtipoNegocio,tipoLugar_idtipoLugar,usuario_idusuario,estrato,estado,fecha,cantHabitaciones,cantBanos,cocina,metroCuadrado,valor,direccion,urlFoto,accesoInternet,servicios,garaje,razonDeshabilitacion) values (11,1,1,2,1,4,'A','09-09-2016 13:26:19',3,3,'Si','77,5',443336000,'calle 153 No 73-32','Ninguna','No aplica','No aplica','Si','Inactivo');
create database crud_pastel

CREATE table PASTEL( 
    id int not null primary key,
    nombre varchar(100),
    descripcion varchar(200),
    preparado_por varchar(100),
    fecha_creacion date,
    fecha_vencimiento date
    );
	
create table INGREDIENTE(
    id int not null primary key,
    nombre varchar(100),
    descripcion varchar(100),
    fecha_ingreso date,
    fecha_vencimiento date
    );

create table pastel_ingrediente( 
	id_pastel int, 	
	id_ingrediente int, 
	foreign key (id_pastel) references pastel(id), 
	foreign key (id_ingrediente) references ingrediente(id)
	);

INSERT INTO PASTEL (id,nombre,descripcion, preparado_por,fecha_creacion, fecha_vencimiento) VALUES 
(1,"fresa","pastel de fresa natural","Daniel Orozco",'2024/2/29','2024/3/27');


insert into ingrediente(id,nombre,descripcion,fecha_ingreso,fecha_vencimiento) values(1,"canela","canela en polvo",'2024/2/20','2024/3/25');
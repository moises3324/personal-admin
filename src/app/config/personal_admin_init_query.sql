/*Create user
CREATE USER 'nisferes' IDENTIFIED BY 'nisferes1*';

GRANT ALL PRIVILEGES ON *.* TO 'nisferes';

FLUSH PRIVILEGES;*/

/*Create database*/
drop database if exists personal_admin;

create database personal_admin;

use personal_admin;

/*Create tables*/
create table centro_costo(
id int auto_increment,
nombre varchar (50) unique not null,
descripcion varchar (250) null,
primary key (id)
);

create table tipo_contrato(
id int auto_increment,
nombre varchar (50) unique not null,
descripcion varchar (250) null,
primary key (id)
);

create table tipo_examen(
id int auto_increment,
nombre varchar (50) unique not null,
descripcion varchar (250) null,
primary key (id)
);

create table tipo_curso(
id int auto_increment,
nombre varchar (50) unique not null,
descripcion varchar (250) null,
primary key (id)
);

create table empleado(
id int auto_increment,
rut varchar (10) unique not null,
nombres varchar(50) not null,
apellido_paterno varchar(25) not null,
apellido_materno varchar(25) null,
primary key (id)
);

create table contratacion(
id int auto_increment,
fecha_termino varchar (20) not null,
tipo_contrato_id int not null,
centro_costo_id int not null,
empleado_id int not null ,
primary key (id),
foreign key (tipo_contrato_id) references tipo_contrato (id),
foreign key (centro_costo_id) references centro_costo (id),
foreign key (empleado_id) references empleado (id)
);

create table examen(
id int auto_increment,
fecha_vencimiento varchar (20) not null,
tipo_examen_id int not null,
empleado_id int not null ,
primary key (id),
foreign key (tipo_examen_id) references tipo_examen (id),
foreign key (empleado_id) references empleado (id)
);

create table curso(
id int auto_increment,
fecha_vencimiento varchar (20) not null,
tipo_curso_id int not null,
empleado_id int not null ,
primary key (id),
foreign key (tipo_curso_id) references tipo_curso (id),
foreign key (empleado_id) references empleado (id)
);

insert into centro_costo values (null, 'Outdoor', '');
insert into centro_costo values (null, 'Documentación', '');
insert into centro_costo values (null, 'Ingeniería', '');
insert into centro_costo values (null, 'Indoor', '');
insert into centro_costo values (null, 'Administracion', '');
insert into centro_costo values (null, 'Energía', '');

insert into tipo_contrato values (null, 'Indefinido', '');
insert into tipo_contrato values (null, 'Plazo Fijo', '');
insert into tipo_contrato values (null, 'Por Obra', '');

insert into tipo_curso values (null, 'CREC', '');
insert into tipo_curso values (null, 'CRRUV', '');
insert into tipo_curso values (null, 'CVM 4x4 MD', '');
insert into tipo_curso values (null, 'Extintores', '');
insert into tipo_curso values (null, 'IPER', '');
insert into tipo_curso values (null, 'MMC', '');
insert into tipo_curso values (null, 'OPR', '');
insert into tipo_curso values (null, 'PCAT', '');
insert into tipo_curso values (null, 'PPAA', '');
insert into tipo_curso values (null, 'PRC', '');
insert into tipo_curso values (null, 'PRE', '');
insert into tipo_curso values (null, 'PRE-AB', '');
insert into tipo_curso values (null, 'PTA', '');
insert into tipo_curso values (null, 'TAPC', '');
insert into tipo_curso values (null, 'TRA', '');
insert into tipo_curso values (null, 'TTATA', '');
insert into tipo_curso values (null, 'UEPP', '');

insert into tipo_examen values (null, 'Altura Física', '');
insert into tipo_examen values (null, 'Altura Geográfica', '');
insert into tipo_examen values (null, 'Altura Física y Goegráfica', '');

insert into empleado values (null, '18030044-9', 'JOSEPH NICOLAS', 'ARAYA', 'VALLADARES');
insert into empleado values (null, '19123980-6', 'MICHEL EDUARDO', 'BLANCO', 'FERNANDEZ');
insert into empleado values (null, '10051164-9', 'ALEXIS ANTONIO', 'CABRERA', 'MORENO');

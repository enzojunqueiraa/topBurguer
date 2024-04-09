/*drop database sala_de_aula;*/

-- drop database if exists tricolorHamburgueria;

create database tricolorHamburgueria;

use tricolorHamburgueria;

create table clientes (
	id int not null auto_increment,
	nome varchar(120) not null,
	endereco varchar(200) not null,
	telefone varchar(11) not null,
	email varchar(200) not null unique,
	cpf varchar(11) not null unique,
	password varchar(50) not null,
	imagem varchar()
	primary key (id)
);

create table pedidos (
	id int not null auto_increment,
	valorTotal decimal(18,2),
	status_id int not null,
	clientes_id int not null,
	primary key (id),
	constraint fk_status_pedidos
		foreign key (status_id)
		references status (id),
	constraint fk_clientes_pedidos
	foreign key (clientes_id)
	references clientes (id)

);


create table produtos (
	id int not null auto_increment,
	nome varchar(120) not null,
	preco decimal(18,2) not null,
	ingredientes varchar(255) not null,
	imagem varchar(120) not null,
	primary key (id)

);

create table status (
id int not null auto_increment,
status varchar(50) not null,
primary key (id)
);

create table pedidos_has_produtos (
pedidos_id int not null,
produtos_id int not null,
primary key (pedidos_id, produtos_id),
constraint fk_pedidos_produtos
	foreign key (pedidos_id)
	references pedidos (id),
constraint fk_produtos_pedidos
	foreign key (produtos_id)
	references produtos (id)
);






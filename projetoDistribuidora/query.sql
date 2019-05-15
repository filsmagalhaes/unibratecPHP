create database distribuidora;
use distribuidora;

create table cliente (
cnpj int primary key, 
nome varchar (255) not null, 
telefone varchar (50), 
email varchar (255) not null
);

create table vendedor (
cpf int primary key, 
nome varchar (255) not null, 
telefone varchar (50), 
email varchar (255) not null
);

create table produto (
id int primary key,
nome varchar (255) not null,
valor decimal (10,2) not null,
descricao varchar (512),
fk_cpf int,
FOREIGN KEY (fk_cpf) REFERENCES vendedor (cpf)
);

create table pedido (
id int auto_increment primary key,
quantidade int not null,
forma_pagamento varchar (255) not null,
fk_cnpj int,
fk_id int,
FOREIGN KEY (fk_cnpj) REFERENCES cliente (cnpj),
FOREIGN KEY (fk_id) REFERENCES produto (id)
);
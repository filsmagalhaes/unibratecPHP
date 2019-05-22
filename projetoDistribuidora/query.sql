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
idVendedor int,
FOREIGN KEY (idVendedor) REFERENCES vendedor (cpf)
);

create table pedido (
id int auto_increment primary key,
quantidade int not null,
forma_pagamento varchar (255) not null,
idCliente int,
idProduto int,
FOREIGN KEY (idCliente) REFERENCES cliente (cnpj),
FOREIGN KEY (idProduto) REFERENCES produto (id)
);
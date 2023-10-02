create database projeto 
use projeto 

create table usuarios(
    id int not null primary key auto_increment
    nome varchar(50) not null,
    email varchar(50) not null,
    senha varchar(50) not null,
    telefone varchar(14) not null
);

create table produtos(
    id int not null primary key auto_increment,
    nome varchar(50) not null,
    descricao varchar(100) not null,
    valor decimal(10, 2) not null
);
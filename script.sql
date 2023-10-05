create database projeto;
use projeto;
create table usuarios(
    id int not null primary key auto_increment,
    id_funcao int not null,
    nome varchar(50) not null,
    email varchar(50) not null,
    senha varchar(50) not null,
    telefone varchar(14) not null,
    criado varchar(20) not null,
    atualizado varchar(20)
);

create table endereco_usuarios(
    id int not null primary key auto_increment,
    id_usuario int not null,
    rua varchar(50) not null,
    numero varchar(50) not null,
    bairro varchar(50) not null,
    cep varchar(50) not null,
    cidade varchar(50) not null
);

create table produtos(
    id int not null primary key auto_increment,
    id_fabricante int not null,
    id_imagem int not null,
    nome varchar(50) not null,
    descricao varchar(100) not null,
    valor decimal(10, 2) not null
);

create table estoque(
    id int not null primary key auto_increment,
    id_produto int not null,
    quantidade int not null
);

create table fabricante(
    id int not null primary key auto_increment,
    nome varchar(50) not null
);

create table funcoes_usuarios (
    id int not null primary key auto_increment,
    funcao varchar(50) not null
);

create table carrinho(
    id int not null primary key auto_increment,
    id_produto int not null,
    id_usuario int not null
);

create table imagens_produtos (
    id int not null primary key auto_increment,
    url varchar(1000) not null
);
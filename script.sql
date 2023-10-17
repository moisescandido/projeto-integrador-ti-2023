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
    id_categoria int not null,
    id_fabricante int not null,
    id_condicao int not null,
    id_oferta int not null,
    id_entrega int not null,
    nome varchar(50) not null,
    descricao varchar(100) not null,
    valor decimal(10, 2) not null
);  
create table categorias_produtos (
    id int not null primary key auto_increment,
    nome varchar(50) not null unique
);

create table condicoes_produtos (
    id int not null primary key auto_increment,
    condicao varchar(50) not null unique
);

create table imagens_produtos (
    id int not null primary key auto_increment,
    id_produto int not null,
    url varchar(1000) not null
);

create table fabricante(
    id int not null primary key auto_increment,
    nome varchar(50) not null unique
);

create table funcoes_usuarios (
    id int not null primary key auto_increment,
    funcao varchar(50) not null unique
);

create table carrinho(
    id int not null primary key auto_increment,
    id_produto int not null,
    id_usuario int not null
);

create table tipo_entrega_produto(
    id int not null primary key auto_increment,
    nome varchar(50) not null unique
);

create table tipo_oferta_produto(
    id int not null primary key auto_increment,
    nome varchar(50) not null unique
);

INSERT INTO funcoes_usuarios (funcao) VALUES
    ('Administrador'),
    ('Cliente');

INSERT INTO fabricante (nome) VALUES
    ('Sony'),
    ('Samsung'),
    ('Apple'),
    ('Nike'),
    ('Adidas'),
    ('LG'),
    ('Coca-Cola'),
    ('Pepsi'),
    ('Ford'),
    ('Toyota');

INSERT INTO categorias_produtos (nome) VALUES
    ('Eletrônicos'),
    ('Roupas'),
    ('Alimentos'),
    ('Móveis');

INSERT INTO condicoes_produtos (condicao) VALUES
    ('Novo'),
    ('Usado'),
    ('Recondicionado');

INSERT INTO tipo_oferta_produto (nome) VALUES
    ('Desconto'),
    ('Liquidação'),
    ('Oferta do dia');

INSERT INTO tipo_entrega_produto (nome) VALUES
    ('Entrega rápida'),
    ('Entrega padrão'),
    ('Retirada na loja');
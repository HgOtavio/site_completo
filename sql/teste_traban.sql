CREATE DATABASE Eli_work117;
USE Eli_work117;


CREATE TABLE Login (
    id_email INT AUTO_INCREMENT PRIMARY KEY,
    Email VARCHAR(100),
    Senha VARCHAR(100),
	id_cads INT,
    FOREIGN KEY (id_cads) REFERENCES Cadastro(id_cds)
    
    
);

CREATE TABLE Cadastro (
    id_cds INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    cep VARCHAR(20),
    cidade VARCHAR(100),
    estado VARCHAR(50),
    pais VARCHAR(50),
    bairro VARCHAR(100),
    logradouro VARCHAR(255),
    numero VARCHAR(10),
    complemento varchar(255)
);

CREATE TABLE Maquina (
	id_maqui INT AUTO_INCREMENT PRIMARY KEY,
    nome_maq VARCHAR(100),
    valor DECIMAL(10, 2),
    peso BOOLEAN,
    acessorios BOOLEAN,
    quantidade_m int
);

CREATE TABLE Vendas (
    id_venda INT AUTO_INCREMENT PRIMARY KEY,
    data_v DATE,
    valor_v DECIMAL(10, 2),
    id_emaill INT,
    produto_v INT,
    FOREIGN KEY (id_emaill) REFERENCES Login(id_email),
    FOREIGN KEY (produto_v) REFERENCES Maquina(id_maqui)
);


select * from Maquina;
select * from Vendas;
select * from Login;
select * from Cadastro;

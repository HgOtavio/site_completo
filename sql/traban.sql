CREATE DATABASE Eli_work7d3;
USE Eli_work7d3;


CREATE TABLE Usuario (
    id_nome INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100),
    Email VARCHAR(100),
    Senha VARCHAR(100)
);

CREATE TABLE Maquina (
    id_maqui INT AUTO_INCREMENT PRIMARY KEY,
    nome_maq VARCHAR(100),
    Valor DECIMAL(10, 2),
	peso boolean,
    acessorios boolean
);

CREATE TABLE Vendas (
    id_venda INT AUTO_INCREMENT PRIMARY KEY,
    data_v DATE,
    valor_v DECIMAL(10, 2),
    usuario_v INT,
    produto_v INT,
    FOREIGN KEY (usuario_v) REFERENCES Usuario(id_nome),
    FOREIGN KEY (produto_v) REFERENCES Maquina(id_maqui)
);

INSERT INTO Usuario (Nome, Email, Senha) VALUES 
('João Silva', 'joao.silva@example.com', 'senha123'),
('Maria Oliveira', 'maria.oliveira@example.com', 'senha456'),
('Carlos Pereira', 'carlos.pereira@example.com', 'senha789'),
('Ana Santos', 'ana.santos@example.com', 'senha101'),
('Lucas Almeida', 'lucas.almeida@example.com', 'senha112'),
('Fernanda Costa', 'fernanda.costa@example.com', 'senha202'),
('Roberto Lima', 'roberto.lima@example.com', 'senha303'),
('Tatiane Gomes', 'tatiane.gomes@example.com', 'senha404'),
('Pedro Martins', 'pedro.martins@example.com', 'senha505'),
('Juliana Reis', 'juliana.reis@example.com', 'senha606'),
('Ricardo Souza', 'ricardo.souza@example.com', 'senha707'),
('Vanessa Lima', 'vanessa.lima@example.com', 'senha808'),
('Felipe Rocha', 'felipe.rocha@example.com', 'senha909'),
('Juliana Alves', 'juliana.alves@example.com', 'senha111'),
('Marcos Silva', 'marcos.silva@example.com', 'senha222'),
('Tatiane Almeida', 'tatiane.almeida@example.com', 'senha333'),
('Eduardo Martins', 'eduardo.martins@example.com', 'senha444'),
('Patrícia Gomes', 'patricia.gomes@example.com', 'senha555'),
('Robson Ferreira', 'robson.ferreira@example.com', 'senha666'),
('Claudia Pinto', 'claudia.pinto@example.com', 'senha777');

INSERT INTO Maquina (nome_maq, Valor, peso, acessorios) VALUES 
('Esteira', 2000.00, true, true),
('Bicicleta Ergométrica', 1500.00, false, true),
('Leg Press', 3500.00, true, false),
('Banco de Supino', 800.00, true, false),
('Puxador Costas', 1800.00, true, true),
('Máquina de Remada', 2200.00, true, true),
('Crossover', 3000.00, true, true),
('Máquina de Abdominal', 1200.00, true, false),
('Gluteus Machine', 1800.00, true, true),
('Máquina de Peitoral', 2500.00, true, true),
('Leg Extension', 1600.00, true, false),
('Máquina de Ombros', 2000.00, true, true),
('Máquina de Panturrilha', 1400.00, true, false),
('Smith Machine', 3500.00, true, true),
('Máquina de Tríceps', 1750.00, true, true);

INSERT INTO Vendas (data_v, valor_v, usuario_v, produto_v) VALUES 
('2024-10-01', 1200.00, 1, 1),
('2024-10-02', 800.00, 2, 2),
('2024-10-03', 950.00, 3, 3),
('2024-10-04', 2500.00, 4, 4),
('2024-10-05', 1500.00, 5, 5),
('2024-10-06', 2200.00, 6, 6),
('2024-10-07', 3000.00, 7, 2),
('2024-10-08', 1200.00, 8, 3),
('2024-10-09', 1800.00, 9, 4),
('2024-10-10', 2500.00, 10, 5),
('2024-10-11', 1600.00, 1, 7),
('2024-10-12', 2000.00, 2, 8),
('2024-10-13', 1400.00, 3, 9),
('2024-10-14', 3500.00, 4, 10),
('2024-10-15', 1750.00, 5, 1);

select * from Maquina;
select * from Vendas;
select * from Usuario;
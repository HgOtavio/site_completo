CREATE DATABASE Eli_work1178;
USE Eli_work1178;

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
INSERT INTO Cadastro (nome, email, senha, cep, cidade, estado, pais, bairro, logradouro, numero, complemento) VALUES 
('Ana Silva', 'ana.silva@email.com', 'senha123', '12345-678', 'São Paulo', 'SP', 'Brasil', 'Centro', 'Rua das Flores', '10', 'Apt 101'),
('Carlos Souza','carlos.souza@email.com','senha456','87654-321','Rio de Janeiro','RJ','Brasil','Copacabana','Avenida Atlântica', '20', 'Apt 202'),
('Mariana Almeida', 'mariana.almeida@email.com', 'senha789', '13579-246', 'Curitiba', 'PR', 'Brasil', 'Batel', 'Rua das Acácias', '300', 'Casa'),
('Ricardo Lima', 'ricardo.lima@email.com', 'senha321', '24680-135', 'Salvador', 'BA', 'Brasil', 'Barra', 'Rua da Praia', '1000', 'Apt 303'),
('Paula Santos', 'paula.santos@email.com', 'senha654', '12321-456', 'Porto Alegre', 'RS', 'Brasil', 'Centro', 'Av. Ipiranga', '150','Aptt 405');


ALTER TABLE Cadastro
ADD COLUMN imagem VARCHAR(255);

CREATE TABLE Maquina (
    id_maqui INT AUTO_INCREMENT PRIMARY KEY,
    nome_maq VARCHAR(100),
    valor DECIMAL(10, 2),
    peso BOOLEAN NOT NULL,
    acessorios BOOLEAN NOT NULL,
    quantidade_m INT
);

INSERT INTO Maquina (nome_maq, valor, peso, acessorios, quantidade_m) VALUES
('Esteira', 3500.00, TRUE, FALSE, 20),
('Bicicleta Ergométrica', 2000.00, TRUE, FALSE, 80),
('Supino Reto', 1200.00, TRUE, FALSE, 30),
('Leg Press', 4500.00, TRUE, FALSE, 22),
('Puxador Lat Pulldown', 1500.00, FALSE, TRUE, 42);

INSERT INTO Maquina (nome_maq, valor, peso, acessorios, quantidade_m) VALUES 
('Elíptico', 1800.00, 1, 0, 8),
('Remo Seco', 1600.00, 1, 0, 6),
('Pulley', 1800.00, 1, 1, 9),
('Cadeira Abdutora', 1300.00, 1, 1, 4),
('Hack Squat', 3200.00, 1, 1, 7),
('Smith Machine', 3000.00, 1, 1, 5),
('Cross Over', 2500.00, 1, 1, 3),
('Leg Curl', 1400.00, 1, 0, 10),
('Cadeira Flexora', 1500.00, 1, 1, 4);

INSERT INTO Maquina (nome_maq, valor, peso, acessorios, quantidade_m) VALUES 
(' Mini Jump Profissional', 15000.00, 1, 1, 25);



-- Adicionando mais unidades aos produtos
UPDATE Maquina
SET quantidade_m = quantidade_m + 5
WHERE nome_maq = 'Esteira';

UPDATE Maquina
SET quantidade_m = quantidade_m + 3
WHERE nome_maq = 'Bicicleta Ergométrica';

UPDATE Maquina
SET quantidade_m = quantidade_m + 2
WHERE nome_maq = 'Supino Reto';

UPDATE Maquina
SET quantidade_m = quantidade_m + 4
WHERE nome_maq = 'Leg Press';

UPDATE Maquina
SET quantidade_m = quantidade_m + 6
WHERE nome_maq = 'Puxador Lat Pulldown';

SELECT id_maqui, nome_maq, quantidade_m FROM Maquina WHERE id_maqui = 1;

CREATE TABLE Vendas (
    id_venda INT AUTO_INCREMENT PRIMARY KEY,
    data_v DATE,
    valor_v DECIMAL(10, 2),
    id_emaill INT,
    produto_v INT,
    FOREIGN KEY (id_emaill) REFERENCES Login(id_email),
    FOREIGN KEY (produto_v) REFERENCES Maquina(id_maqui)
);
INSERT INTO Vendas (data_v, valor_v, id_emaill, produto_v) VALUES
('2024-10-01',1500.00,10,1),
('2024-10-02',300.00,11,2),
('2024-10-03',2000.00,12,3),
('2024-10-04',450.00,13,4),
('2024-10-05',1200.00,14,5);

CREATE TABLE Pagamento (
    id_pagamento INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    nome_cartao VARCHAR(100) NOT NULL,
    numero_cartao VARCHAR(20) NOT NULL,
    validade VARCHAR(5) NOT NULL,
    cvv VARCHAR(4) NOT NULL,
    data_pagamento TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES Cadastro(id_cds)
);

														-- CRUDs --
		-- seletores da tabela -- 
select * from Maquina;
select * from Vendas;
select * from Login;
select * from Cadastro;
select * from pagamento;
-- mostra detalhes da tabela--
SHOW CREATE TABLE Vendas;
-- descrição da maquina--
DESCRIBE Cadastro;

DELETE FROM Cadastro WHERE id_cds = 17;
		-- Adicionar campo em alguma maquina--

-- adicionar um formato de data--
ALTER TABLE Pagamento ADD COLUMN quantidade INT NOT NULL; SELECT DATE_FORMAT(data_pagamento, '%d/%m/%Y %H:%i:%s') AS data_pagamento_formatada FROM Pagamento;

-- adicionar a chave-estrangeira de Maquinas--
ALTER TABLE Pagamento ADD COLUMN id_maqui INT;
-- adicionar a chave-estrangeira de Maquinas--
ALTER TABLE Pagamento ADD CONSTRAINT fk_maquina FOREIGN KEY (id_maqui) REFERENCES Maquina(id_maqui);
-- Adicionar o campo de desconto no cadastro do usuário
ALTER TABLE Cadastro ADD desconto_cadastro INT DEFAULT 0;
-- Adicionar o campo de desconto em máquinas específicas
ALTER TABLE Maquina ADD desconto DECIMAL(5, 2) DEFAULT 0.00;
-- Adicionar o campo para registrar o desconto aplicado no pagamento
ALTER TABLE Pagamento ADD desconto_aplicado DECIMAL(10, 2) DEFAULT 0.00;
-- Adicionar o campo para parcelas
ALTER TABLE pagamento ADD COLUMN num_parcelas INT;
 
                                                -- Consultas -- 
-- 1- LISTAR TODAS AS MAQUINAS ORDENADAS POR NOME
 SELECT nome_maq FROM Maquina ORDER BY nome_maq;
 SELECT * FROM Maquina;

-- 2- LISTAR TODAS AS MAQUINAS QUE NÃO POSSUEM ACESSORIOS
SELECT acessorios, nome_maq FROM Maquina where acessorios is false;

-- 3- LISTAR TODAS AS MAQUINAS QUE NÃO POSSUEM PESO
SELECT peso, nome_maq FROM Maquina where peso is false;

-- 4- LISTAR TODAS AS MAQUINAS QUE NÃO POSSUEM PESO E NÃO POSSUEM ACESSORIOS
SELECT acessorios, peso, nome_maq FROM Maquina where acessorios IS false and peso IS false;

-- 5- MOSTRAR A QUANTIDADE DE VENDAS E O VALOR TOTAL AGRUPADA POR ANOS
SELECT sum(valor_v), count(*) as id_venda FROM Vendas;

-- 6- MOSTRAR A QUANTIDADE DE MAQUINAS QUE POSSUEM ACESSORIOS
select count(*) as nome_maq from Maquina where acessorios is true;

-- 7 - MOSTRAR A QUANTIDADE DE MAQUINAS QUE POSSUEM PESO
select count(*) as nome_maq from Maquina where peso is true;

-- 8 - MOSTRAR QUAIS FORAM AS MAQUINAS COMPRADAS POR UM DETERMINADO CLIENTE
SELECT C.nome AS Cliente, M.nome_maq as Maquina  FROM vendas AS V
JOIN cadastro AS C
ON c.id_cds = V.id_emaill 
JOIN maquina AS m
ON V.produto_v = id_maqui
WHERE  c.id_cds = 3;

-- 9 - MOSTRAR QUAIS FORAM AS 10 MAQUINAS MAIS VENDIDAS DE TODA LOJA
SELECT M.nome_maq, COUNT(V.id_venda) AS total_vendas FROM Vendas V
JOIN Maquina M 
ON V.produto_v = M.id_maqui
GROUP BY M.id_maqui
ORDER BY total_vendas DESC
LIMIT 10;

-- 10- MOSTRAR AS 10 MAQUINAS MAIS VENDIDAS NO ULTIMO ANO
SELECT M.nome_maq, COUNT(V.id_venda) AS total_vendas FROM Vendas V
JOIN Maquina M ON V.produto_v = M.id_maqui
WHERE V.data_v >= CURDATE() - INTERVAL 1 YEAR
GROUP BY M.id_maqui
ORDER BY total_vendas DESC
LIMIT 10;

-- 11- MOSTRAR A QUANTIDADE DE VALOR ARRECADO POR MAQUINA, LISTANDO DA QUE ARRECADOU MAIS, PARA A MENOR
SELECT M.nome_maq, SUM(V.valor_v) AS total_arrecadado FROM Vendas V
JOIN Maquina M ON V.produto_v = M.id_maqui
GROUP BY M.id_maqui
ORDER BY total_arrecadado DESC;

-- 12 - MOSTRAR QUAIS CLIENTES MAIS COMPROU NA LOJA (EM RELAÇÃO AO VALOR ARRECADADO)
SELECT C.nome, C.email, SUM(V.valor_v) AS total_gasto FROM Vendas V
JOIN Cadastro C ON V.id_emaill = C.id_cds
GROUP BY C.id_cds
ORDER BY total_gasto DESC;

-- 13 - MOSTRAR QUAIS CLIENTES COMPROU MAIS MAQUINAS QUE POSSUEM PESO. 
SELECT C.nome, C.email, COUNT(V.id_venda) AS total_compras_com_peso FROM Vendas V
JOIN Cadastro C ON V.id_emaill = C.id_cds
JOIN Maquina M ON V.produto_v = M.id_maqui
WHERE M.peso = TRUE
GROUP BY C.id_cds
ORDER BY total_compras_com_peso DESC;


-- 14 - MOSTRAR O VALOR MÉDIO DAS MAQUINAS QUE POSSUEM PESO.
select nome_maq, avg(valor) from maquina where peso IS true;

-- 15 - MOSTRAR O VALOR MÉDIO DAS MAQUINAS QUE POSSUEM ACESSORIOS
select nome_maq, avg(valor) from maquina where acessorios IS true;

-- 16 - MOSTRAR AS 10 MAQUINAS MENOS VENDIDAS NO ANO
SELECT M.nome_maq, COUNT(V.id_venda) AS total_vendas FROM Vendas V
JOIN Maquina M ON V.produto_v = M.id_maqui
WHERE V.data_v >= CURDATE() - INTERVAL 1 YEAR
GROUP BY M.id_maqui
ORDER BY total_vendas
LIMIT 10;

-- 17 - MOSTRAR QUAIS AS 5 MAQUINAS MAIS CARAS
select nome_maq, valor from maquina order by valor
limit 5;

-- 18 - MOSTRAR  A QUANTIDADE DE CLIENTES CADASTRADOS
select count(id_cds) from cadastro;

-- 19 - MOSTRAR TODAS AS MAQUINAS QUE COMECEM COM A LETRA a
select nome_maq from maquina 
where nome_maq like 'A%';

-- 20 - Mostrar todos os clientes cadastrados que ainda não fizeram nenhuma compra
SELECT C.nome, C.email FROM Cadastro C
LEFT JOIN Vendas V ON C.id_cds = V.id_emaill
WHERE V.id_venda IS NULL;
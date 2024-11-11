Projeto de Site em PHP com Carrinho de Compras e Sistema de Pagamento

Este projeto é um site desenvolvido em PHP que permite aos usuários explorar uma lista de máquinas de academia, adicionar itens ao carrinho,  realizar pagamentos. O site também possui um sistema de autenticação de usuários e um banco de dados para armazenar informações sobre máquinas, usuários e pagamentos.

Funcionalidades

1. Autenticação de Usuários

Cadastro e login de usuários.

Verificação de sessão para acesso às páginas restritas.



2. Listagem de Máquinas

Exibição de uma lista de máquinas disponíveis para compra.

Exibição da quantidade em estoque e preço de cada máquina.



3. Carrinho de Compras

Usuários podem adicionar máquinas ao carrinho.

O sistema verifica se há estoque disponível antes de adicionar.

Visualização e atualização do carrinho de compras.


4. Página de Pagamento

Após confirmar o carrinho, o usuário é redirecionado para a página de pagamento.

Inserção dos dados de pagamento que são armazenados no banco de dados.

Exibição do valor total com descontos aplicados.




Estrutura do Projeto

login.php: Página de login de usuários.

carrinho01.php: Página onde o usuário adiciona e visualiza o carrinho.

pagamento.php: Página para inserção de dados de pagamento.

Maquina.php: Código responsável pela listagem de máquinas e gerenciamento de estoque.

edite.php e saveedit.php: Páginas para edição e salvamento dos dados do usuário.

Conexão com o banco de dados: Gerenciada pelo arquivo conex.php.


Configuração do Projeto

Pré-requisitos

1. PHP: Certifique-se de ter o PHP instalado.


2. XAMPP: Use o XAMPP para configurar o servidor local e o MySQL.


3. Banco de Dados: O projeto utiliza um banco de dados MySQL com as seguintes tabelas:

Cadastro: Armazena os dados dos usuários.

Maquina: Armazena os dados das máquinas, incluindo estoque e preço.

Pagamento: Armazena os dados de pagamentos e descontos aplicados.




Instalação

1. Clone o repositório:

git clone https://github.com/HgOtavio/site_compl[Uploading teste_traban.sql…]()
eto.git


2. Configuração do banco de dados:

[UploaCREATE DATABASE Eli_work1178;
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
('Carlos Souza', 'carlos.souza@email.com', 'senha456', '87654-321', 'Rio de Janeiro', 'RJ', 'Brasil', 'Copacabana', 'Avenida Atlântica', '20', 'Apt 202'),
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
ALTER TABLE Pagamento ADD COLUMN quantidade INT NOT NULL;
SELECT DATE_FORMAT(data_pagamento, '%d/%m/%Y %H:%i:%s') AS data_pagamento_formatada FROM Pagamento;
select * from Maquina;
select * from Vendas;
SHOW CREATE TABLE Vendas;
select * from Login;
select * from Cadastro;
select * from pagamento;
DESCRIBE Cadastro;
DELETE FROM Cadastro WHERE id_cds = 17;
ALTER TABLE Pagamento ADD COLUMN id_maqui INT;
ALTER TABLE Pagamento ADD CONSTRAINT fk_maquina FOREIGN KEY (id_maqui) REFERENCES Maquina(id_maqui);
-- Adicionar o campo de desconto no cadastro do usuário
ALTER TABLE Cadastro
ADD desconto_cadastro INT DEFAULT 0;

-- Adicionar o campo de desconto em máquinas específicas
ALTER TABLE Maquina
ADD desconto DECIMAL(5, 2) DEFAULT 0.00;

-- Adicionar o campo para registrar o desconto aplicado no pagamento
ALTER TABLE Pagamento
ADD desconto_aplicado DECIMAL(10, 2) DEFAULT 0.00;

ALTER TABLE pagamento
ADD COLUMN num_parcelas INT;ding teste_teste.sql…]()


[Uploading<?php
// Informações de conexão ao banco de dados MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Eli_work1178";

// Criando a conexão ao banco de dados
$conexao = new mysqli($servername, $username, $password, $dbname);

 //Verificando se a conexão foi bem-sucedida
 //if ($conexao->connect_error) {
   // echo"Falha na conexão ";
//}
// echo  "sucesso na conexão ";//


// Fechar a conexão
//$conexao->close();


?> conex.php…]()




3. Inicie o servidor local com o XAMPP, colocando os arquivos do projeto na pasta htdocs.



Uso

1. Acesse o site no navegador:

http://localhost/nomedoprojeto


2. Crie uma conta ou faça login para acessar o carrinho de compras.


3. Adicione máquinas ao carrinho e visualize o valor com descontos aplicados.


4. Finalize a compra na página de pagamento.




Contribuição

Sinta-se à vontade para contribuir com melhorias e correções para o projeto. Crie um pull request com uma breve descrição das alterações propostas.

Licença

Este projeto está sob a licença MIT. Consulte o arquivo LICENSE para obter mais informações.


---

Esse README.md oferece uma visão geral do site, incluindo suas funcionalidades, configuração, uso e detalhes sobre o sistema de descontos.


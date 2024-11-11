<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include_once('conex.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// Verifica se o formulário de pagamento foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['finalizar'])) {
    if (isset($_POST['nome_cartao'], $_POST['numero_cartao'], $_POST['validade'], $_POST['cvv'], $_POST['parcelas'])) {
        // Valida o formato da validade (MM/AA)
        $validade = $_POST['validade'];
        if (!preg_match('/^\d{2}\/\d{2}$/', $validade)) {
            echo "Formato de validade inválido. Use MM/AA.";
            exit;
        }

        $parcelas = $_POST['parcelas'];
        // Validação opcional do número de parcelas
        if ($parcelas < 1 || $parcelas > 12) {
            echo "Número de parcelas inválido. O valor deve estar entre 1 e 12.";
            exit;
        }

        $email = $_SESSION['email'];
        $query = "SELECT id_cds FROM Cadastro WHERE email = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();
        
        if ($usuario) {
            $id_usuario = $usuario['id_cds'];
            $nome_cartao = $_POST['nome_cartao'];
            $numero_cartao = $_POST['numero_cartao'];
            $cvv = $_POST['cvv'];
            $id_maqui = $_SESSION['id_maquina'];
            $quantidade = $_SESSION['carrinho'][$id_maqui]['quantidade'];
            
            $query_pagamento = "INSERT INTO Pagamento (id_usuario, id_maqui, nome_cartao, numero_cartao, validade, cvv, quantidade, num_parcelas) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt_pagamento = $conexao->prepare($query_pagamento);
            $stmt_pagamento->bind_param("iissssii", $id_usuario, $id_maqui, $nome_cartao, $numero_cartao, $validade, $cvv, $quantidade, $parcelas);
            
            try {
                if ($stmt_pagamento->execute()) {
                    unset($_SESSION['carrinho']);
                    $_SESSION['message'] = "Compra realizada com sucesso!";
                    header("Location: maquinas.php");
                    exit;
                }
            } catch (mysqli_sql_exception $e) {
                echo "Erro ao processar o pagamento: " . $e->getMessage();
            }
        }
    } else {
        echo "Por favor, preencha todos os campos do pagamento.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
    <link rel="shortcut icon" href="favicon\Imagem_do_WhatsApp_de_2024-11-07_à_s__21.39.20_90d7f4da-removebg-preview.png" type="image/x-icon"> <!--icone site-->
    <style>
        *{
            margin: 0px;
            padding: 0px;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        }


        #img_l{
            width: 50px;
            height: 50px;
            margin-left:-51px;
        }
        body { 
            overflow-y: hidden; 
            overflow-x: hidden;
            background-color: pink;
            background-image: url(favicon/pngtree-gym-icon-lifting-vector-weight-png-image_5124835.png);
            background-repeat: repeat;
            background-size: 150px 130px;
            
        }

        #localizar{
            display: flex;
            justify-content: center;
            margin-top: 3%; /*mudar posição cima*/
        }

        #corpo{
            width: 500px;
            height: 500px;
            border-radius: 30px;
            flex-direction: column;
            background-color: brown;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #meio{
            width: 500px;
            height: 300px;
            display: flex;
            justify-content: space-around;
        }

        #part1{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

        .input{
            display: flex;
            align-self: center;
            height: 25px;
            border: solid white;
            color: white;
            font-size: 17px;
            border-radius: 10px;
            background-color: rgba(188, 188, 188, 0.315);
        }

        #h1{
            margin-top: 10px;
            color: white;
            font-size: 55px;
            text-align: center;
        }

        #butao{
            width: 260px;
            height: 50px;
            border-radius: 10px;
            box-shadow: 3px 3px 5px 0px rgb(89, 1, 1);
            color: white;
            font-size: 20px;
            font-weight: bold;
            border: none;
            background-color: rgba(233, 21, 21, 0.581);
            margin: 25px 120px;
        }

        .texto{
            color: white;
            font-weight: bold;
            text-align: center;
        }

        input::placeholder{
            color: rgba(255, 255, 255, 0.721);
            font-size: 15px;
            padding-left: 10px;
        }

        /*Cabeçario*/

        #cabeça{
            background-image: linear-gradient(to left, rgb(80, 6, 6), black);
            width: 100%;
            padding-bottom: 0.5%;
        }

        #home{
            margin-left: 0%;
        }

        #lupa{
            width: 30px;
            height: 30px;
        }

        #canto{
            width: 170px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }


        #car, #cont{
            width: 40px;
            height: 40px;
        }

        #header{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            padding-top: 20px;
        }

        #in_cab{
            border-radius: 10px;
            border: solid;
            border-color: white;
            color: white;
            background-color:rgb(62, 20, 20);
            width: 400px;
            height: 30px;
        }

        #menu{
            display: flex ;
            flex-direction: row;
            width: 250px;
        }

        .menu_a{
            text-decoration: none;
            color: rgb(255, 255, 255);
            transition: 0.4s;
        }

        .menu_div{
            padding: 5px;
            margin-right: 3px;
            background-color: rgba(149, 2, 2, 0.635); 
            border-radius: 4px;
            transition: 1s;
        }

        .menu_div:hover{
            background-color: rgb(223, 46, 46); 
            
        }
        .menu_a:hover{
            color: rgb(46, 0, 0);
        }

        #pesquisa_b{
            border: none;
            background-color: transparent;
        }

        #barra_p{
            display: flex;
            flex-direction: row;
            padding-top: 5px;
        }
    </style>
</head>
<body>
    <!--Cabeçario-->
    <div id="cabeça">
            <header id="header">
                <!--Logo-->
                <div id="home" ><a  href="homesite.php"><img id="img_l" src="favicon\Imagem_do_WhatsApp_de_2024-11-05_à_s__09.35.37_0f8e92c1-removebg-preview.png" alt="home"></a></div>                <!--Barra de pesquisa-->
                <div id="barra_p">
                    <input type="search" id="in_cab" placeholder="Buscar..."/>
                    <button id="pesquisa_b" type="submit"><img id="lupa" src="favicon/lupaa.png" alt="lupa"></button>
                </div>
                <!--Carrinho e conta-->
                <div id="canto">
                    <div id="conta"><a href="betasite.php"><img id="cont" src="favicon/kindpng_746008.png" alt="login"></a></div>
                    <div id="carrinho"><a href="homesite02.php"><img id="car" src="favicon/pngfind.com-compras-png-6808978.png" alt="carrinho"></a></div>
                </div>
            </header>
            <!--Menu-->
            <menu id="menu">
                <div class="menu_div"><a href="homesite.php" class="menu_a">Home</a></div>
                <div class="menu_div"><a href="maquinas.php" class="menu_a">Produtos</a></div>
                <div class="menu_div"><a href="#" class="menu_a">Suporte</a></div>
            </menu>
        </div>

    
<div id="localizar">
    <div id="corpo">
        <h1 id="h1">Pagamento</h1>
        
                <form method="POST" action="">
                <div id="meio">
                <div id="part1">
                <label for="nome_cartao" class="texto">Nome no Cartão:</label>
                <input type="text" id="nome_cartao" name="nome_cartao" required class="input">

                <label for="numero_cartao" class="texto">Número do Cartão:</label>
                <input type="text" id="numero_cartao" name="numero_cartao" pattern="\d{16}" maxlength="16" required placeholder="Digite o número do cartão" class="input"/>

                <label for="validade" class="texto">Validade (MM/AA):</label>
                <input type="text" id="validade" name="validade" pattern="\d{2}/\d{2}" maxlength="5" required placeholder="MM/AA" class="input">

                <label for="cvv" class="texto">CVV:</label>
                <input type="text" id="cvv" name="cvv" pattern="\d{3}" maxlength="3" required placeholder="Digite o CVV" class="input"/>

                <label class="texto">Número de Parcelas</label>
                <input class="input" type="number" name="parcelas" placeholder="1 a 12" min="1" max="12" required >
                </div>
                </div>
                <button type="submit" name="finalizar" id="butao">Finalizar Pagamento</button>
            </form>

            <?php
            // Exemplo de exibição do data_pagamento em formato brasileiro
            if (isset($data_pagamento)) {
                $data_formatada = date("d/m/Y H:i:s", strtotime($data_pagamento));
                echo "<p>Data do pagamento: $data_formatada</p>";
            }
            ?>
        
    

    </div>
</div>
</body>
</html>
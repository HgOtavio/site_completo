<?php
session_start();
include_once('conex.php');

// Verifica se o formulário foi enviado
if (isset($_POST['cadastrar'])) {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];

    // Verifica se o email já existe no banco
    $sqlSelect = "SELECT email FROM Cadastro WHERE email = '$email'";
    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        header("Location: cadastro02.php?error=email_existente");
        exit;
    } else {
        // Criptografa a senha
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        // Insere os dados no banco de dados
        $sqlInsert = "INSERT INTO Cadastro (nome, email, senha, cep, cidade, estado, pais, bairro, numero, complemento) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conexao->prepare($sqlInsert);
        $stmt->bind_param("ssssssssss", $nome, $email, $senha_hash, $cep, $cidade, $estado, $pais, $bairro, $numero, $complemento);

        if ($stmt->execute()) {
            // Redireciona para a página de login após o cadastro
            header("Location: login.php?sucesso=cadastro");
            exit;
        } else {
            header("Location: cadastro02.php?erro=erro_cadastro");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="shortcut icon" href="favicon\Imagem_do_WhatsApp_de_2024-11-07_à_s__21.39.20_90d7f4da-removebg-preview.png" type="image/x-icon"> <!--icone site-->
    <style>
        *{
            margin: 0px;
            padding: 0px;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
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
            
            margin-top: 1%; /*mudar posição cima*/
        }

        #corpo{
            width: 700px;
            height: 500px;
            border-radius: 30px;
            flex-direction: column;
            background-color: brown;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #meio{
            width: 550px;
            height: 340px;
            display: flex;
            justify-content: space-around;
        }

        #part1, #part2{
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
            font-size: 45px;
            
        }

        #p{
            margin-bottom: 20px;
            color: white;
            font-weight: bold;
        }

        #a{
            color: white;
            font-weight: normal;
        }

        #butao{
            width: 160px;
            height: 40px;
            border-radius: 10px;
            box-shadow: 3px 3px 5px 0px rgb(89, 1, 1);
            color: white;
            font-size: 20px;
            font-weight: bold;
            border: none;
            background-color: rgba(233, 21, 21, 0.581);
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .texto{
            color: white;
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

        #img_l{
            width: 50px;
            height: 50px;
            margin-left:-51px;
        }
    </style>
</head>
<body>
     <!--Cabeçario-->
     <div id="cabeça">
        <header id="header">
            <!--Logo-->
            <div id="home" ><a  href="homesite.php"><img id="img_l" src="favicon\Imagem_do_WhatsApp_de_2024-11-05_à_s__09.35.37_0f8e92c1-removebg-preview.png" alt="home"></a></div>            <!--Barra de pesquisa-->
            <div id="barra_p">
                <input type="search" id="in_cab" />
                <button id="pesquisa_b" type="submit"><img id="lupa" src="favicon/lupaa.png" alt="lupa"></button>
            </div>
            <!--Carrinho e conta-->
                <div id="canto">
                    <div id="conta"><a href="http://localhost/trbalho_Eli/php/login.php"><img id="cont" src="favicon/kindpng_746008.png" alt="login"></a></div><!--link para login-->
            </div>
        </header>
        <!--Menu-->
        <menu id="menu">
            <div class="menu_div"><a href="http://localhost/trbalho_Eli/php/homesite02.php" class="menu_a">Home</a></div><!--link pagina inicial-->
            <div class="menu_div"><a href="http://localhost/trbalho_Eli/php/maquinas.php" class="menu_a">Produtos</a></div><!--link maquinas-->
            <div class="menu_div"><a href="http://localhost/trbalho_Eli/php/homesite02.php#suporte" class="menu_a">Suporte</a></div><!--link pagina inicial, parte suporte-->
        </menu>
</div>

    <main id="localizar">
        
        <section class="form-container">
        <div id="corpo">
            <h1 id="h1">Cadastro</h1>
            <?php if (isset($_GET['erro'])) : ?>
                <div class="error-message">Erro ao cadastrar, tente novamente.</div>
            <?php endif; ?>
            <form action="" method="POST" id="corpo">
                
                <div class="form-section" id="meio">
                    <div class="form-column" id="part1">
                        <label for="nome" class="texto">Nome:</label>
                        <input type="text" id="nome" name="nome" required class="input">

                        <label for="email" class="texto">Email:</label>
                        <input type="email" id="email" name="email" required class="input">

                        <label for="senha" class="texto">Senha:</label>
                        <input type="password" id="senha" name="senha" required class="input">

                        <label for="cep" class="texto">CEP:</label>
                        <input type="text" id="cep" name="cep" class="input">

                        <label for="pais" class="texto">País:</label>
                        <input type="text" id="pais" name="pais" class="input">
                    </div>
                    
                    <div class="form-column" id="part2">
                        <label for="cidade" class="texto">Cidade:</label>
                        <input type="text" id="cidade" name="cidade" class="input">

                        <label for="estado" class="texto">Estado:</label>
                        <input type="text" id="estado" name="estado" class="input">

                        <label for="bairro" class="texto">Bairro:</label>
                        <input type="text" id="bairro" name="bairro" class="input">

                        <label for="logradouro" class="texto">Logradouro:</label>
                        <input type="text" id="logradouro" name="logradouro" class="input">

                        <label for="numero" class="texto">Número:</label>
                        <input type="text" id="numero" name="numero" class="input">

                        <label for="complemento" class="texto">Complemento:</label>
                        <input type="text" id="complemento" name="complemento" class="input">
                    </div>
                </div>
                
                
                <!-- Botão para Submeter o Formulário -->
                <button id="butao" type="submit" class="button" id="cadastrar" name="cadastrar" >Cadastrar</button>
                <p class="link_entrar" id="p">Já tem cadastro? <a href="login.php" class="link_entrar" id="a">Entrar</a></p>
            </form>
        </div>
        </section>
        
        
    </main>
</body>
</html>
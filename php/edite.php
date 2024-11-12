<?php
    // Ativa a exibição de erros para facilitar a depuração
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Verifica se o parâmetro 'id_cds' foi passado via GET
    if (!empty($_GET['id_cds'])) {
        // Inclui o arquivo de conexão com o banco de dados
        include_once('conex.php');

        // Obtém o valor de 'id_cds' da URL
        $id = $_GET['id_cds'];
        
        // Cria uma consulta SQL para selecionar todos os dados do usuário com base no 'id_cds'
        $sqlSelect = "SELECT * FROM Cadastro WHERE id_cds = '$id'";

        // Executa a consulta no banco de dados
        $result = $conexao->query($sqlSelect);

        // Se a consulta falhar, exibe uma mensagem de erro
        if (!$result) {
            die("Erro na consulta SQL: " . $conexao->error);
        }

        // Verifica se o resultado contém algum dado (usuário encontrado)
        if ($result->num_rows > 0) {
            // Extrai os dados do usuário para variáveis
            $user_data = $result->fetch_assoc();
            $nome = $user_data['nome'];
            $senha = $user_data['senha'];
            $email = $user_data['email'];
            $cep = $user_data['cep'];
            $cidade = $user_data['cidade'];
            $estado = $user_data['estado'];
            $pais = $user_data['pais'];
            $bairro = $user_data['bairro'];
            $numero = $user_data['numero'];
            $complemento = $user_data['complemento'];
        } else {
            // Se nenhum usuário for encontrado, redireciona para a página de cadastro
            header('Location: cadastro02.php');
            exit;
        }
    } 
?>
<!DOCTYPE html>
<html lang="pt">
<head>
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

        .tt input{
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
            font-size: 35px;
        }

        #butao input{
            width: 160px;
            height: 60px;
            border-radius: 10px;
            box-shadow: 3px 3px 5px 0px rgb(89, 1, 1);
            color: white;
            font-size: 30px;
            font-weight: bold;
            border: none;
            background-color: rgba(233, 21, 21, 0.581);
            margin-bottom: 10px;
        }

        .tt label{
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
                    <div id="conta"><a href="betasite.php"><img id="cont" src="favicon/kindpng_746008.png" alt="login"></a></div><!--link para perfil-->
    
                <div id="carrinho"><a href="carrinho01.php"><img id="car" src="favicon/pngfind.com-compras-png-6808978.png" alt="carrinho"></a></div> <!--link carrinho, se estiver logado-->
            </div>
        </header>
        <!--Menu-->
        <menu id="menu">
            <div class="menu_div"><a href="http://localhost/trbalho_Eli/php/homesite02.php" class="menu_a">Home</a></div><!--link pagina inicial-->
            <div class="menu_div"><a href="maquinas.php" class="menu_a">Produtos</a></div><!--link maquinas-->
            <div class="menu_div"><a href="http://localhost/trbalho_Eli/php/homesite02.php#suporte" class="menu_a">Suporte</a></div><!--link pagina inicial, parte suporte-->
        </menu>
</div>
    <div class="container" id="localizar">
        <div class="form-container" id="corpo">
            <form action="saveedit.php" method="POST">
                <div id="corpo" >
                    <h1 id="h1">Editar Informações do Cliente</h1>
                    <div id="meio">
                        <div id="part1" class="tt">
                            <div class="inputBox">
                            <label for="nome" class="labelInput">Nome</label>
                            <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo htmlspecialchars($nome); ?>" required>
                            
                        </div>
                        <div class="inputBox">
                            <label for="senha_antiga" class="labelInput">Senha Antiga</label>
                            <input type="password" name="senha_antiga" id="senha_antiga" class="inputUser" required>
                        </div>
                        <div class="inputBox">
                            <label for="senha_nova" class="labelInput">Senha Nova</label>
                            <input type="password" name="senha_nova" id="senha_nova" class="inputUser" required>
                        </div>
                        <div class="inputBox">
                            <label for="senha_nova_confirm" class="labelInput">Confirmar Senha Nova</label>
                            <input type="password" name="senha_nova_confirm" id="senha_nova_confirm" class="inputUser" required> 
                        </div>
                        <div class="inputBox">
                            <label for="email" class="labelInput">Email</label>
                            <input type="text" name="email" id="email" class="inputUser" value="<?php echo htmlspecialchars($email); ?>" required>
                        </div>
                        <div class="inputBox">
                            <label for="cep" class="labelInput">CEP</label>
                            <input type="text" name="cep" id="cep" class="inputUser" value="<?php echo htmlspecialchars($cep); ?>" requiredclass="input">
                        </div>
                        </div>
                        <div id="part2" class="tt">
                                <div class="inputBox">
                                    <label for="cidade" class="labelInput">Cidade</label>
                                <input type="text" id="cidade" name="cidade" class="inputUser" value="<?php echo htmlspecialchars($cidade); ?>" required>
                            </div>
                            <div class="inputBox">
                                <label for="estado" class="labelInput">Estado</label>
                                <input type="text" name="estado" id="estado" class="inputUser" value="<?php echo htmlspecialchars($estado); ?>" required>
                            </div>
                            <div class="inputBox">
                                <label for="pais" class="labelInput">País</label>
                                <input type="text" name="pais" id="pais" class="inputUser" value="<?php echo htmlspecialchars($pais); ?>" required>
                            </div>
                            <div class="inputBox">
                                <label for="bairro" class="labelInput">Bairro</label>
                                <input type="text" name="bairro" id="bairro" class="inputUser" value="<?php echo htmlspecialchars($bairro); ?>" required>
                            </div>
                            <div class="inputBox">
                                <label for="numero" class="labelInput">Número</label>
                                <input type="text" name="numero" id="numero" class="inputUser" value="<?php echo htmlspecialchars($numero); ?>" required>
                            </div>
                            <div class="inputBox">
                                <label for="complemento" class="labelInput">Complemento</label>
                                <input type="text" name="complemento" id="complemento" class="inputUser" value="<?php echo htmlspecialchars($complemento); ?>" required>
                            </div>
                        </div>
                    </div>
                    <div id="butao">
                        <input type="hidden" name="id_cds" value="<?php echo htmlspecialchars($id); ?>" >
                        <input type="submit" id="submit" name="update" value="Atualizar" >
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</body>
</html>
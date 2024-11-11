<?php
session_start();
include_once('conex.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// Adiciona ao carrinho
if (isset($_POST['adicionar'])) {
    $maquina_id = $_POST['maquina_id'];
    $quantidade = $_POST['quantidade'];

    // Verifica a quantidade em estoque
    $query = "SELECT quantidade_m FROM Maquina WHERE id_maqui = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("i", $maquina_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $maquina = $result->fetch_assoc();

    // Verificação de depuração: Exibir os dados retornados
    //echo "<pre>";
    //var_dump($maquina);
    //echo "</pre>";

    // Força a conversão da quantidade para inteiro
    $quantidade_estoque = (int) $maquina['quantidade_m'];

    // Verificação de depuração: Exibir a quantidade convertida
    //echo "Quantidade em estoque (convertida): " . $quantidade_estoque . "<br>";

    // Se a quantidade em estoque for suficiente
    if ($quantidade_estoque >= $quantidade) {
        // Adiciona ao carrinho
        if (!isset($_SESSION['carrinho'][$maquina_id])) {
            $_SESSION['carrinho'][$maquina_id] = [
                'quantidade' => 0
            ];
        }
        $_SESSION['carrinho'][$maquina_id]['quantidade'] += $quantidade;

        // Atualiza o estoque
        $novo_estoque = $quantidade_estoque - $quantidade;
        $update_query = "UPDATE Maquina SET quantidade_m = ? WHERE id_maqui = ?";
        $update_stmt = $conexao->prepare($update_query);
        $update_stmt->bind_param("ii", $novo_estoque, $maquina_id);
        $update_stmt->execute();

        $_SESSION['message'] = 'Produto adicionado ao carrinho com sucesso!';
    } else {
        $_SESSION['message'] = 'Quantidade em estoque insuficiente!';
    }
}

// Lista as máquinas disponíveis
$query = "SELECT * FROM Maquina";
$result = $conexao->query($query);

// Verificação de depuração: Se a consulta ao banco de dados foi bem-sucedida

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máquinas</title>
    <link rel="shortcut icon" href="favicon\Imagem_do_WhatsApp_de_2024-11-07_à_s__21.39.20_90d7f4da-removebg-preview.png" type="image/x-icon"> <!--icone site-->
    <style>
        *{
            margin: 0px;
            padding: 0px;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        }

        body::-webkit-scrollbar {
            width: 0px;
        }

        body { 
            background-color: pink;
            background-image: url(favicon/pngtree-gym-icon-lifting-vector-weight-png-image_5124835.png);
            background-repeat: repeat;
            background-size: 150px 130px;
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

        /*Rodapé*/
        /*Email*/

        #email{
            display: flex;
            flex-direction: row;
            background-color: rgb(207, 0, 0);
            color: white;
            height: 65px;
            align-items: center;
            justify-content: space-evenly;
        }

        #nome_emi{
            width: 400px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        #email_i_n{
            width: 300px;
            height: 30px;
            border-radius: 10px;
            border: solid;
            border-color: white;
            background-color: rgb(231, 50, 50);
            color: white;
        }

        #email_i_n::placeholder{
            color: white;
            opacity: 0.5;
        }

        #but_enciar_e{
            width: 90px;
            height: 35px;
            border-radius: 20px;
            box-shadow: 3px 3px 5px 0px rgb(89, 1, 1);
            border: none;
        }

        #icone_email{
            width: 55px;
            height: 55px;
        }
        /*Suporte*/

        #suporte{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            color: rgb(255, 255, 255);
            background-image: linear-gradient(to left, rgb(80, 6, 6), black);
        }

        .bloco_s{
            display: flex;
            padding: 20px;
        }

        .tex_su{
            display: flex;
            flex-direction: column;
        }

        .linha{
            height: 300px;
            border-left: 2px solid;
        }

        #bloco2{
            margin-right: 400px;
        }

        .separar{
            margin-left: 14px;
        }

        .texto_sa a, #redes_sa a{
            color: white;
            text-decoration: none;
            margin-left: 30px;
            
        }

        .texto_sa a:hover{
            color: rgb(191, 191, 191);
        }

        .texto_sa{
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            height: 200px;
        }

        #extra{
            height: 250px;
        }

        #redes_sa{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            
        }

        #redes{
            display: flex;
            margin-top: 10px;
        }

        /*Meio da pg*/

        #maqui{
            height: 1350px; /*tamanho da pagina*/
        }

        #h1_ma{
            font-size: 55px;
            background-color: pink;
            margin: 20px;
            width: 255px;
            margin-bottom: 0px;
            color: rgb(69, 0, 0);
        }

        #conteudo{
            height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            
        }

        .um{
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            
        }

        .conteiner{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            border-radius: 20px;
            margin: 20px;
            background-image: radial-gradient(rgb(161, 161, 161), white);
            height: 350px;
            width: 250px;
        }

        .img_ma{
            width: 200px;
            height: 200px;
            padding-top: 20px;
        }

        .texto{
            display: flex;
            flex-direction: column;
            height: 100px;
            width: 200px;
            justify-content: space-between;
            padding-bottom: 20px;
        }

        .butoes{ /*não sei se pode*/
            display: flex;
            margin-top: 5px;
        }

        .texto input{
            width: 40px;
            height: 25px;
            margin-right: 5px;
            font-weight: bold;
            border-radius: 5px;
            border: solid 1.5px rgb(56, 0, 0);
        }

        .texto button{
            box-shadow: 3px 3px 5px 0px rgb(133, 131, 131);
            color: white;
            background-color: rgba(233, 21, 21, 0.776);
            border: none;
            border-radius: 5px;
            padding: 10px;
        }

        .texto p{
            font-weight: bolder;
        }

        #p_p{
            margin-left: 20px;
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
                    <div id="conta"><a href="http://localhost/trbalho_Eli/php/login.php"><img id="cont" src="favicon/kindpng_746008.png" alt="login"></a></div><!--link para login ou perfil-->
    
                <div id="carrinho"><a href="carrinho01.php"><img id="car" src="favicon/pngfind.com-compras-png-6808978.png" alt="carrinho"></a></div> <!--link carrinho, se estiver logado-->
            </div>
        </header>
        <!--Menu-->
        <menu id="menu">
            <div class="menu_div"><a href="http://localhost/trbalho_Eli/php/homesite02.php" class="menu_a">Home</a></div><!--link pagina inicial-->
            <div class="menu_div"><a href="http://localhost/trbalho_Eli/php/maquinas.php" class="menu_a">Produtos</a></div><!--link maquinas-->
            <div class="menu_div"><a href="http://localhost/trbalho_Eli/php/maquinas.php#suporte" class="menu_a">Suporte</a></div><!--link pagina inicial, parte suporte-->
        </menu>
</div>

<div id="maqui">
    <h1 id="h1_ma">Máquinas Disponíveis</h1>

    <div id="conteudo">
    <?php
    if (isset($_SESSION['message'])) {
        echo "<p id='p_p'>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
    }
    echo "<div class='um'>";
    // Exibe as máquinas
    while ($maquina = $result->fetch_assoc()) {
        // Força a conversão para inteiro da quantidade
        $quantidade_estoque = (int) $maquina['quantidade_m'];

        // Verificação de depuração: Exibir a quantidade de estoque
        //echo "Quantidade em estoque para a máquina " . htmlspecialchars($maquina['nome_maq']) . ": " . $quantidade_estoque . "<br>";

        // Exibe as informações da máquina
        echo "<div class='conteiner'>";
        echo "<img src='favicon\Gemini_Generated_Image_5lfire5lfire5lfi-removebg-preview.png' alt='Maquina' class='img_ma'>";
        if ($quantidade_estoque == 0) {
            echo "<div class='texto'>";
            echo "<p id='maquina_nome'>Nome: " . htmlspecialchars($maquina['nome_maq']) . "</p>";
            echo "<p><strong>ESGOTADO</strong></p>";  // Mensagem de esgotado
            echo "</div>";
        } else {
            echo "<div class='texto'>";
            echo "<p>Nome: " . htmlspecialchars($maquina['nome_maq']) . "</p>";
            echo "<p>Quantidade em Estoque: " . htmlspecialchars($quantidade_estoque) . "</p>";
            echo "<form method='post' action='maquinas.php'>";
            echo "<input type='hidden' name='maquina_id' value='" . 
            htmlspecialchars($maquina['id_maqui']) . "'>";
            echo "<input type='number' name='quantidade' min='1' max='" . htmlspecialchars($quantidade_estoque) . "' required>";
            echo "<button type='submit' name='adicionar' class='btn'>Adicionar ao Carrinho</button>";
            echo "</form>";
            echo "</div>";
            
        }
        echo "</div>";
    }
    echo "</div>";
    ?>
    </div>
</div>

<!--Rodapé-->
<footer id="receber">
    <!--Email-->
    <div id="email">
        <div id="nome_emi">
            <img src="favicon/email-removebg-preview.png" alt="icone email" id="icone_email">
            <h1 id="texto_rn">Receba Novidades</h1>
        </div>
        <div id="emial_n">
            <input type="email" id="email_i_n" placeholder="Digite seu email">
            <button type="submit" id="but_enciar_e">Enviar</button>
        </div>
    </div>
    <!--Suporte-->
    <div id="suporte">
        <div class="bloco_s">
            <div class="linha"></div>
            <div class="tex_su">
                <h2 class="separar" id="sobre_nos">Sobre nós</h2>
                <div class="texto_sa">
                    <p><a href="#" >Termos de Uso</a></p>
                    <p><a href="#" >Trabalhe Conosco</a></p>
                    <p><a href="#" >Política de Privacidade</a></p>
                    <p><a href="#" >Quem somos?</a></p>
                </div>
                <div id="redes_sa">
                    <h3 class="separar">Redes sociais</h3>
                    <div id="redes">
                        <p><a href="#"><img src="#" alt="facebook"></a></p>
                        <p><a href="#"><img src="#" alt="Instagram"></a></p>
                        <p><a href="#"><img src="#" alt="X"></a></p>
                        <p><a href="#"><img src="#" alt="tiktok"></a></p>
                        <p><a href="#"><img src="#" alt="Discord"></a></p>
                        <p><a href="#"><img src="#" alt="Youtube"></a></p>
                    </div>
                </div>
            </div>    
        </div>
        <div class="bloco_s" id="bloco2">
            <div class="linha"></div>
            <div class="tex_su">
                <h2 class="separar" id="ajuda">Ajuda e Suporte</h2>
                <div class="texto_sa" id="extra">
                    <p><a href="#">Fale Conosco</a></p>
                    <p><a href="#">Email</a></p>
                    <p><a href="#">Assistente Online</a></p>
                    <p><a href="#">Central de ajuda</a></p>
                    <p><a href="#">Acessibilidade</a></p>
                </div>
            </div>
        </div>
</div>
</footer>
</body>
</html>
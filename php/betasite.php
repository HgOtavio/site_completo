<?php
// Verifiicar conexão
session_start();
include_once('conex.php');

// Verifica se o usuário está logado
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}

$logado = $_SESSION['email'];

// Consulta para buscar o nome e a imagem do usuário logado
$sql = "SELECT nome, imagem FROM Cadastro WHERE email = '$logado' LIMIT 1";
$result = $conexao->query($sql);
$user_data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Somente a linkagem para o FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Página do Usuário | GN</title>
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

        #conta img{
            width: 40px;
            height: 40px;
        }

        /*Perfil*/

        #localizar{
            display: flex;
            justify-content: center;
            margin-top: 3%; /*mudar posição cima*/
        }

        #bloco{
            width: 900px;
            height: 450px;
            border-radius: 30px;
            flex-direction: column;
            background-color: brown;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #h1{
            margin-top: 20px;
            color: white;
            font-size: 45px;

        }

        .butao{
            width: 90px;
            height: 40px;
            border-radius: 10px;
            box-shadow: 3px 3px 5px 0px rgb(89, 1, 1);
            color: white;
            text-decoration: none;
            font-weight: bold;
            border: none;
            background-color: rgba(233, 21, 21, 0.73);
            margin: 25px 5px;
            font-size: 20px;
        }

        #ed{
            background-color: rgba(21, 21, 233, 0.828);
        }

        #input{
            height: 300px;
            width: 500px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

        .dados_1{
            display: flex; 
            justify-content: space-between;
            width: 800px;
            margin-bottom: -80px;
        }

        .dados_2{
            display: flex;
            justify-content: space-between;
            width: 800px;
        }

        .co{
            background-color: #AC5858;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
            color: white;
            width: 50px;
            border: solid 2px rgba(147, 17, 17, 0.936);
            font-size: 20px;
        }

        .inf{
            background-color: white;
            padding: 20px;
            width: 200px;
            margin-top: 20px;
            border-radius: 0px 10px 10px 10px;
            font-size: 20px;
        }
        
        #cep{
            display: flex;
            width: 240px;
        }

        #butoes{
            display: flex;
        }

        .a_a{
            text-decoration: none;
            color: white;
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
                <input type="search" id="in_cab" placeholder="Buscar..."/>
                <button id="pesquisa_b" type="submit"><img id="lupa" src="favicon/lupaa.png" alt="lupa"></button>
            </div>
            <!--Carrinho e conta-->
            <div id="canto">
                <div id="conta"><a href="sair.php"><img src="favicon\Imagem_do_WhatsApp_de_2024-11-08_à_s__12.18.22_95568bd4-removebg-preview.png" alt="sair"></a></div>
                <div id="carrinho"><a href="carrinho01.php"><img id="car" src="favicon/pngfind.com-compras-png-6808978.png" alt="carrinho"></a></div>
            </div>
        </header>
        <!--Menu-->
        <menu id="menu">
            <div class="menu_div"><a href="homesite02.php" class="menu_a">Home</a></div>
            <div class="menu_div"><a href="maquinas.php" class="menu_a">Produtos</a></div>
            <div class="menu_div"><a href="homesite02.php#suporte" class="menu_a">Suporte</a></div>
        </menu>
    </div>

<!-- Boas-vindas -->
<div id="localizar">
    <div id="bloco">
    <h1 id="h1">Bem-vindo, <u><?php echo htmlspecialchars($user_data['nome']); ?></u></h1>
    <!--<p>Abaixo estão suas informações de perfil.</p> -->

    <!-- Tabela de Informações do Usuário -->
    <table>
        <thead>
            <div class="dados_1">
                <div class="co">Nome</div>
                <div class="co">Email</div>
                <div id="cep"><div class="co">CEP</div></div>
    </div>
        </thead>
        <tbody>
            <?php
            // Reconsultando os dados completos do usuário
            $sql = "SELECT * FROM Cadastro WHERE email = '$logado' ORDER BY id_cds DESC";
            $result = $conexao->query($sql);
            
            while ($user_data = mysqli_fetch_assoc($result)) {
                echo "<div class='dados_2'>";
                echo "<div class='inf'>".htmlspecialchars($user_data['nome'])."</div>";
                echo "<div class='inf'>".htmlspecialchars($user_data['email'])."</div>";
                echo "<div class='inf'>".htmlspecialchars($user_data['cep'])."</div>";
                echo "</div>";
                echo "<div id='butoes'>
                    <button class='butao' id='ed'><a class='a_a' href='edite.php?id_cds=".$user_data['id_cds']."' title='Editar' >Editar</a></button>
                    <button class='butao'><a class='a_a' href='excluir.php?id_cds=".$user_data['id_cds']."' title='Excluir' >Excluir</a></button>
                </div>";
                
            }
            ?>
        </tbody>
    </table>
    </div>
</div>
</body>
</html>
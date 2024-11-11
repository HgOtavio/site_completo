<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
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
            margin-top: 7%; /*mudar posição cima*/
        }

        #bloco{
            width: 400px;
            height: 350px;
            border-radius: 30px;
            flex-direction: column;
            background-color: brown;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #input{
            display: flex;
            flex-direction: column;
            width: 300px;
        }

        #email, #senha{
            height: 40px;
            margin: 15px;
            border: solid white;
            color: white;
            font-size: 17px;
            border-radius: 10px;
            background-color: rgba(188, 188, 188, 0.315);
        }

        #h1{
            margin-top: 20px;
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

        input::placeholder{
            color: white;
            font-size: 15px;
            padding-left: 10px;
        }

        #butao{
            width: 160px;
            height: 60px;
            border-radius: 10px;
            box-shadow: 3px 3px 5px 0px rgb(89, 1, 1);
            color: white;
            font-size: 25px;
            font-weight: bold;
            border: none;
            background-color: rgba(233, 21, 21, 0.581);
            margin-bottom: 10px;
            margin-left: 65px;
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
            <div id="home" ><a  href="homesite.php"><img id="img_l" src="favicon\Imagem_do_WhatsApp_de_2024-11-05_à_s__09.35.37_0f8e92c1-removebg-preview.png" alt="home"></a></div>
            <!--Barra de pesquisa-->
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
            <div class="menu_div"><a href="homesite.php#suporte" class="menu_a">Suporte</a></div>
        </menu>
    </div>
    <!-- Conteúdo de Login -->
    <div id="localizar">
        <div id="bloco">
        <h1 id="h1">Login</h1>
        <form action="testlg.php" method="POST">
            <div id="input">
            <input type="text" name="email" placeholder="Email" required id="email">
            <input type="password" name="senha" placeholder="Senha" required id="senha">
            </div>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar" id="butao">
        </form>
        <?php if (isset($_SESSION['login_error'])): ?>
            <p style="color: red;"><?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?></p>
        <?php endif; ?>
        <p id="p">Não tem cadastro? <a href="cadastro02.php" id="a">Cadastrar</a></p>
        </div>
    </div>
</body>
</html>
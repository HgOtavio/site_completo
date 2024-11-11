<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WE</title>
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

/*Corpo 1*/

#corpo{
    background-image: linear-gradient(to left, rgb(191, 16, 16), rgb(5, 5, 5));
    width: 100%;
    height: 500px;
    color: white;
}

#estrutura{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0px 15px;
}

.butoes_corpo{
    display: flex;
    height: 30px;
    width: 20px;
    justify-content: center;
    align-items: center;
    background-color: transparent;
    border: none;
    margin: 0px 40px;
}

.butoes_corpo img{
    width: 80px;
}

#corpo_cop1{
    display: flex;
    width: 900px;
    height: 500px;
    align-items: center;
    justify-content: space-between;
}

#direita{
    height: 400px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

#sobre_p{
    height: 320px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 20px;
    padding-top: 30px;
}

#img_c1{
    width: 250px;
}

#esquerda{
    height: 350px;
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    align-items: center;
}

#valor_s{
    height: 150px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
}

#imagem_c{
    height: 479px;
    width: 469px;
}

#aproveite img, #aproveite{
    height: 140px;
    width: 240px;
    margin-top: 30px;
}

#img_v{
    height: 80px;
    width: 80px;
}

.p_corpo{
    display: flex;
    align-items: center;
}

#peso_i{
    height: 130px;
    width: 130px;
}

#img_p{
    height: 100px;
    width: 100px;
}

#img{
    height: 90px;
    width: 90px;
}


/*serve*/
#serve {
    background-color: rgb(207, 0, 0);
    color: white;
    height: 65px;
}

#link_serve{
    color: white;
    text-decoration: none;
}

#titulo_serve, #link_serve{
    padding-left: 15px;
}
/*Tipos*/

#destaques{
    height: 500px;
}

#titulo_des{
    padding: 20px 0px;
    display: flex;
    justify-content: center;
}

#localizacao_des{
    display: flex;
    justify-content: space-evenly;
}

.produtos_des{
    display: flex;
    background-color: gainsboro;
    height: 400px;
    width: 350px;
    flex-direction: column;
    border-radius: 20px;
    align-items: center;
    justify-content: space-between;
}

.img_des{
    width: 300px;
    height: 300px;
}

.link_des{
    color: rgb(0, 0, 0);
    text-decoration: none;
 }

.parte_baixo{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding-bottom: 20px;
}
.setas{
    margin-left: -3px;
    width: 14px;
    height: 14px;
}

/*Mais vendidos*/

#m_vendidos{
    background-image: linear-gradient(to left, rgb(135, 10, 10), black);
    height: 510px;
}

#titulo_mv{
    display: flex;
    justify-content: center;
    padding: 20px 0px;
    color: white;
}

.produtos_mv{
    border-radius: 20px;
    background-color: rgb(251, 0, 0);
    margin: 7px;
    width: 500px;
    height: 350px;
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    
}

.escrito_mv{
    height: 100px;
    width: 200px;
    display: flex;
    flex-direction: column;
    align-items: baseline;
    justify-content: space-between;
    padding-bottom: 20px;
}

#sepa_mv{
    display: flex;
    justify-content: space-evenly;
}

#ver_produtos{
    display: flex;
    justify-content: end;
    margin: 2px 20px 10px 0px;
    text-decoration: none;
    color: white;
    align-items: center;
}

#seta{
    margin-left: 3px;
    width: 12px;
    height: 12px;
}

.img_mv{
    width: 200px;
    height: 200px;
    padding-top: 20px;
}

.but_comp, .but_comp a{
    background-color: transparent;
    color: transparent;
    text-decoration: none;
    border: none;
}

.link_mv:hover::before{
    content: "Comprar";
    font-size: 40px;
    font-weight: bold;
    padding: 35px 30px;
    height: 100px;
    width: 200px;
    border-radius: 30px;
    color: rgb(68, 0, 0);
    background-color: rgb(255, 255, 255); 
    box-shadow: 3px 3px 5px 0px rgb(89, 1, 1);
    border: none;
}

.link_mv{
    color: white;
    text-decoration: none;
    transition: 0.5s;
}

.link_mv:hover{
    color: transparent;
    margin-top: 30px;
}

/*Avaliações*/

#avaliacao_clientes{
    height: 400px;
}

#clientes{
    display: flex;
    justify-content: center;
    padding: 20px 0px;
}

#corpo_ava{
    display: flex;
    justify-content: space-evenly
}

.bloco_ac{
    display: flex;
    background-color: gainsboro;
    width: 320px;
    height: 300px;
    flex-direction: column;
    border-radius: 20px;
    box-shadow: 1px 1px 7px 0px rgb(0, 0, 0);
}

.parte_cima{
    display: flex;
    flex-direction: column;
    padding-top: 15px;
    padding-left: 9px;

}

.perfil_nome_p{
    display: flex;
    width: 250px;
    justify-content: space-between;
    align-items: center;
}

.avaliacao_c{
    padding-left: 10px;
    margin-top: -9px;
}

.estrelas_c{
    width: 140px;
    height: 90px;
    margin-top: -25px;
}

.perfil_c{
    width: 80px;
    height: 80px;
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
    <!--Corpo 1-->
<div id="corpo">
    <div id="estrutura">
        <!--Butão d-->
            <button id="direita_b" class="butoes_corpo"><img src="favicon/Imagem_do_WhatsApp_de_2024-11-07_à_s__05.42.36_324b5647-removebg-preview.png" alt="D"></button>
        <div id="corpo_cop1">
            <!--Escrito d-->
            <div id="direita">
                <h1 id="nome_p">Esteira Ergométrica</h1>
                <div id="sobre_p">
                    <h3 class="p_corpo"><img src="favicon/istockphoto-803812960-612x612-removebg-preview.png" alt="velocidade" id="img_v"> 16 km/h</h3>
                    <h3 class="p_corpo"><img src="favicon/balancas-de-peso-diet-outline-icon-design-preto-e-branco_678192-2803-removebg-preview.png" alt="peso" id="peso_i"> 130kg</h3>
                    <h3 class="p_corpo"><img src="favicon/gettyimages-1389737046-612x612-removebg-preview.png" alt="potencia" id="img"> 5.0HP</h3>
                </div>
            </div>
            <!--Meio-->
            <img src="favicon/Gemini_Generated_Image_qqnhphqqnhphqqnh-removebg-preview.png" alt="produto_img" id="imagem_c">
            <!--Escrito e-->
            <div id="esquerda">
                <div id="valor_s">
                    <h1 id="valor">Valor</h1>
                    <img id="img_c1" src="favicon/ffff (2).png" alt="desconto">
                </div>
                <a href="http://localhost/trbalho_Eli/php/maquinas.php#maquina_nome" id="aproveite"><img src="favicon\Captura_de_tela_2024-11-07_203930-removebg-preview.png" alt="aproveite"></a>
            </div>
        </div>
        <!--Butão e-->
        <button id="esquerda_b" class="butoes_corpo"><img src="favicon/Imagem_do_WhatsApp_de_2024-11-07_à_s__05.42.36_e0096d3f-removebg-preview.png" alt="E"></button>
    </div>
</div>
<!--Para que serve-->
<div id="serve">
    <h1 id="titulo_serve">Para que serve os equipamentos?</h1>
    <a id="link_serve" href="pgteste/saibamais.html">Saiba mais</a>
</div>
<!--Destaques-->
<div id="destaques">
    <h1 id="titulo_des">Tipos de Maquinas</h1>
    <div id="localizacao_des">
        <!--Part1-->
        <div class="produtos_des">
            <a href="maquinas.php"><img src="favicon\Gemini_Generated_Image_k1nxnlk1nxnlk1nx-removebg-preview.png" alt="Produto" class="img_des"></a>
            <div class="parte_baixo">
                <h2 class="nome_des">Treino de Força</h2>
                <a href="maquinas.php" class="link_des">Saiba Mais <img src="favicon/pngwing.com.png" alt="seta" class="setas"></a> <!--link maquinas, cima-->
            </div>
        </div>
        <!--Part2-->
        <div class="produtos_des">
            <a href="maquinas.php"><img src="favicon\Gemini_Generated_Image_i015xli015xli015-removebg-preview.png" alt="Produto" class="img_des"></a><!--link maquinas, baixo-->
            <div class="parte_baixo">
                <h2 class="nome_des">Treino Cardiovascular</h2>
                <a href="maquinas.php" class="link_des">Saiba Mais <img src="favicon/pngwing.com.png" alt="seta" class="setas"></a>
            </div>
        </div>
    </div>
</div>
<!--Mais vendidos-->
<div id="m_vendidos">
    <h1 id="titulo_mv">Mais Vendidos</h1>
    <div id="sepa_mv">
        <!--Part1-->
        <div class="produtos_mv">
            <img src="favicon/Gemini_Generated_Image_jmpj6djmpj6djmpj-removebg-preview.png" alt="produto" class="img_mv">
            <a href="http://localhost/trbalho_Eli/php/maquinas.php" class="link_mv"><!--link maquinas, produto-->
                <div class="escrito_mv">
                        <div class="es_mv">
                            <h2 class="nome_mv">Supino reto</h2>
                            <p class="legenda_mv">Legenda</p>
                        </div>
                        <h3 class="preco_mv">R$ 1.200,00</h3>
                </div>
            </a>
        </div>
       <!--Part2-->
       <div class="produtos_mv">
        <img src="favicon\Gemini_Generated_Image_5lfire5lfire5lfi-removebg-preview.png" alt="produto" class="img_mv">
        <a href="http://localhost/trbalho_Eli/php/maquinas.php" class="link_mv"><!--link maquinas, produto-->
            <div class="escrito_mv">
                    <div class="es_mv">
                        <h2 class="nome_mv">Supino reto</h2>
                        <p class="legenda_mv">Legenda</p>
                    </div>
                    <h3 class="preco_mv">R$ 1.200,00</h3>
            </div>
        </a>
    </div>
        <!--Part3-->
        <div class="produtos_mv">
            <img src="favicon\Gemini_Generated_Image_jqlw66jqlw66jqlw-removebg-preview.png" alt="produto" class="img_mv">
            <a href="http://localhost/trbalho_Eli/php/maquinas.php" class="link_mv"><!--link maquinas, produto-->
                <div class="escrito_mv">
                        <div class="es_mv">
                            <h2 class="nome_mv">Supino reto</h2>
                            <p class="legenda_mv">Legenda</p>
                        </div>
                        <h3 class="preco_mv">R$ 1.200,00</h3>
                </div>
            </a>
        </div>
        <!--Part4-->
        <div class="produtos_mv">
            <img src="favicon\Gemini_Generated_Image_p76xop76xop76xop-removebg-preview.png" alt="produto" class="img_mv">
            <a href="http://localhost/trbalho_Eli/php/maquinas.php" class="link_mv"><!--link maquinas, produto-->
                <div class="escrito_mv">
                        <div class="es_mv">
                            <h2 class="nome_mv">Supino reto</h2>
                            <p class="legenda_mv">Legenda</p>
                        </div>
                        <h3 class="preco_mv">R$ 1.200,00</h3>
                </div>
            </a>
        </div>
        <!--Part5-->
        <div class="produtos_mv">
            <img src="favicon\Gemini_Generated_Image_qqnhphqqnhphqqnh-removebg-preview.png" alt="produto" class="img_mv">
            <a href="http://localhost/trbalho_Eli/php/maquinas.php" class="link_mv"><!--link maquinas, produto-->
                <div class="escrito_mv">
                        <div class="es_mv">
                            <h2 class="nome_mv">Supino reto</h2>
                            <p class="legenda_mv">Legenda</p>
                        </div>
                        <h3 class="preco_mv">R$ 1.200,00</h3>
                </div>
            </a>
        </div>
    </div>
    <!--Link-->
    <a href="http://localhost/trbalho_Eli/php/maquinas.php" id="ver_produtos">Ver todos os produtos <img src="favicon/Daco_5466446.png" alt="seta" id="seta"></a><!--link maquinas-->
</div>
<!--Avaliação-->
<div id="avaliacao_clientes">
    <h1 id="clientes">Nosso clientes falam:</h1>
    <div id="corpo_ava">
        <!--Part1-->
        <div class="bloco_ac">
            <div class="parte_cima">
                <div class="perfil_nome_p">
                    <img src="favicon/perfil (1).png" alt="perfil" class="perfil_c">
                    <h2 class="nome_c">Jarina Silveira</h2>
                </div>
                <abbr title="5 Estrelas"><img src="favicon/vecteezy_5-star-rating-review-star-png-transparent_9663927.png" alt="estrelas" class="estrelas_c"></abbr>
            </div>
            <p class="avaliacao_c">"Suposta avaliação"</p>
        </div>
        <!--Part2-->
        <div class="bloco_ac">
            <div class="parte_cima">
                <div class="perfil_nome_p">
                    <img src="favicon/perfil.png" alt="perfil" class="perfil_c">
                    <h2 class="nome_c">João Alencar</h2>
                </div>
                <abbr title="5 Estrelas"><img src="favicon/vecteezy_5-star-rating-review-star-png-transparent_9663927.png" alt="estrelas" class="estrelas_c"></abbr>
            </div>
            <p class="avaliacao_c">"Suposta avaliação"</p>
        </div>
        <!--Part3-->
        <div class="bloco_ac">
            <div class="parte_cima">
                <div class="perfil_nome_p">
                    <img src="favicon/perfil (1).png" alt="perfil" class="perfil_c">
                    <h2 class="nome_c">Julia Almeida</h2>
                </div>
                <abbr title="5 Estrelas"><img src="favicon/vecteezy_5-star-rating-review-star-png-transparent_9663927.png" alt="estrelas" class="estrelas_c"></abbr>
            </div>
            <p class="avaliacao_c">"Suposta avaliação"</p>
        </div>
        <!--Part4-->
        <div class="bloco_ac">
            <div class="parte_cima">
                <div class="perfil_nome_p">
                    <img src="favicon/perfil.png" alt="perfil" class="perfil_c">
                    <h2 class="nome_c">Felipe Janário</h2>
                </div>
                <abbr title="5 Estrelas"><img src="favicon/vecteezy_5-star-rating-review-star-png-transparent_9663927.png" alt="estrelas" class="estrelas_c"></abbr>
            </div>
            <p class="avaliacao_c">"Suposta avaliação"</p>
        </div>
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
        <button type="submit" id="but_enciar_e" ><a href="homesite.php#suporte">Enviar</a></button>
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

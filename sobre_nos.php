<?php
    session_start();

    require_once "conexao/conexao.php";




       $usuario = $_SESSION["usuario"];
    
     

     
       if(is_null($usuario["email"])){
           session_unset();
       session_destroy();
           header("Location: Login.php");
           exit();
       }
       //echo $nomeUsuario;
if($_SERVER["REQUEST_METHOD"]==="POST"){
$pesquisa=$_POST["pesquisa"];
$_SESSION['pesquisa']=$pesquisa;
include_once "pesquisa.php";
    }
       $conexao->close(); 
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/estilo.css">
    <title>sobre nos</title>
</head>
<body>
<div class="cabecalho">
        <div class="btnMenu">
            <button id="toggleButton"><img src="imagens/menu_FILL0_wght400_GRAD0_opsz24.png"></button>
        </div>
        <form action="" method="post" class="botpesquisa">
            <input type="text" name="pesquisa" id="pesquisa">
            <button type="submit" name="pesquisar" id="iconpesquisa">
                <img src="imagens/search_FILL0_wght400_GRAD0_opsz24.png">
            </button>
            <div class="carrinho">
                <a href="carrinho.php"> <img src="imagens/shopping_cart_FILL0_wght400_GRAD0_opsz24.png"
                        id="carrinho"></a>
            </div>
        </form>

    </div>
    <!--     menu lateral -->
    <div class="cabecalhoMenu">
        <div class="headerMenu">
            <div class="closeMenu">
                <button id="toggleButton2"><img src="imagens/close_FILL0_wght400_GRAD0_opsz24">
                </button>
            </div>
            <div class="headerMenuTitle">

            </div>
        </div>
        <div class="contentMenu">
            <ul>
                <h2>Usuário: <?= $usuario['nome_usuario']?> </h2>
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href="ajuda.php">Ajuda</a></li>
                <li><a href="configuracoes.php">Configurações</a></li>
                <li><a href="amigos.php">Amigos</a></li>
                <li><a href="autores.php">Autores</a></li>
                <li><a href="sobre_nos.php">Sobre nós</a></li>
                <li><a href="sair.php">Sair</a></li>
            </ul>
        </div>

    </div>
    <!--  fim menu -->
<main class="sobrenos">
    <div class="sobreinicio">
        <h1>QUEM SOMOS? </h1>
    <p>
    Nossa empresa de tecnologia, denominada Creators of Thought, foi fundada com o objetivo de ajudar a solucionar um problema enfrentado por milhares de autores nacionais e por pessoas que não sabem por onde começar a ter o gosto pela leitura.</p> 
<p>Nosso slogan, ”Levando você ao futuro”, reflete nosso compromisso em fornecer reconhecimento, acessibilidade e facilidade  de alta qualidade sobre o problema que estamos solucionando.</p>
    </p>
</div>
<div class="imgsobre">
<img src="imagens/simbolo_empresa.jfif">
</div>
<div class="missao_sobre">
<h1>MISSÃO, VISÃO E VALORES</h1>
<h2>Missão </h2>
<p>Reconhecimento de autores nacionais, facilitar o acesso, e despertar o interesse pela literatura para desconhecedor. Visando o aprimoramento do leitor.</p>
<h2>Visão </h2>
<p>Ser referência no mercado digital e literário.
</p>
<h2>Valores </h2>
<p>Atender a necessidade;
Diversidade;
Inovação.
</p>
</div>
<div class="cot_sobre">
<h2>O QUE É A "COT"?</h2>
<p>Nosso site é dedicado a tudo que envolve livros em geral. Este site é  projetado para fornecer informações sobre autores, livros para comprar e interação entre os usuários.</p>
<p>Nossa plataforma é fácil de usar e foi criada para atender tanto leitores quanto profissionais da área de leitura. Aqui você encontra autores, livros, chat de interação e um quiz, no qual lhe ajuda a descobrir qual gênero literário você pode mais se identificar. </p>

</div>
<div class="imgsobre">
<img src="imagens/logo_projeto.png">
</div>



</main>





    <script src="js/menulateral".js> </script>

</body>
</html>

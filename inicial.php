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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
    

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
    <main class="principal">
        <div class="banners">
            <a href="banners.php">Banners</a>
        </div>
        <div class="meio">
            <div class="comunidade">
                <a href="comunidade.php"> Comunidade</a>
            </div>
            <div class="itens">
                <a href="itens.php">Itens</a>
            </div>
        </div>
        <div class="sugestao">
            <a href="sugestao.php"> Sugestão de livros</a>
        </div>
    </main>

<script src="js/menulateral".js></script></body>

</html>

<?php
    session_start();

    require_once "conexao/conexao.php";

    $usuario = $_SESSION["usuario"];
    
    echo $usuario["nome_usuario"]; 


    if(is_null($usuario["email"])){
        session_unset();
        session_destroy();
        header("Location: Login.php");
        exit();
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css.css" rel="stylesheet";>
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
                <li><a href="inicial.php">Inicial</a></li>
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
<header class="header">
  <div class="logo">
    Logo
  </div>
  <nav class="main-nav">
    <ul>
      <li>Home</li>
      <li>Icon</li>
      <li>Icon 2</li>      
    </ul>
  </nav>
</header>
<main>
  <section class="news-feed">
    <article class="post">
      <div class="post__header">
        <img class="avatar" src="http://via.placeholder.com/50x50" />
        <div class="post__info">
          <a href="#">User Name</a>
          <span>Just Now</span>
        </div>        
      </div>
      <div class="post__content">
        <img src="http://via.placeholder.com/490x400" />
      </div>
      <div class="post__engage">
        <a href="#">Like</a>
        <a href="#">Comment</a>
        <a href="#">Share</a>
      </div>
      <div class="comment">
        <img class="avatar" src="http://via.placeholder.com/50x50" />
        <input type="text" placeholder="Write a comment..">
      </div>
    </article>
		<article class="post">
      <div class="post__header">
        <img class="avatar" src="http://via.placeholder.com/50x50" />
        <div class="post__info">
          <a href="#">User Name</a>
          <span>Just Now</span>
        </div>        
      </div>
      <div class="post__content">
        <img src="http://via.placeholder.com/490x400" />
      </div>
      <div class="post__engage">
        <a href="#">Like</a>
        <a href="#">Comment</a>
        <a href="#">Share</a>
      </div>
      <div class="comment">
        <img class="avatar" src="http://via.placeholder.com/50x50" />
        <input type="text" placeholder="Write a comment..">
      </div>
    </article>
		<article class="post">
      <div class="post__header">
        <img class="avatar" src="http://via.placeholder.com/50x50" />
        <div class="post__info">
          <a href="#">User Name</a>
          <span>Just Now</span>
        </div>        
      </div>
      <div class="post__content">
        <img src="http://via.placeholder.com/490x400" />
      </div>
      <div class="post__engage">
        <a href="#">Like</a>
        <a href="#">Comment</a>
        <a href="#">Share</a>
      </div>
      <div class="comment">
        <img class="avatar" src="http://via.placeholder.com/50x50" />
        <input type="text" placeholder="Write a comment..">
      </div>
    </article>
		<article class="post">
      <div class="post__header">
        <img class="avatar" src="http://via.placeholder.com/50x50" />
        <div class="post__info">
          <a href="#">User Name</a>
          <span>Just Now</span>
        </div>        
      </div>
      <div class="post__content">
        <img src="http://via.placeholder.com/490x400" />
      </div>
      <div class="post__engage">
        <a href="#">Like</a>
        <a href="#">Comment</a>
        <a href="#">Share</a>
      </div>
      <div class="comment">
        <img class="avatar" src="http://via.placeholder.com/50x50" />
        <input type="text" placeholder="Write a comment..">
      </div>
    </article>
		<article class="post">
      <div class="post__header">
        <img class="avatar" src="http://via.placeholder.com/50x50" />
        <div class="post__info">
          <a href="#">User Name</a>
          <span>Just Now</span>
        </div>        
      </div>
      <div class="post__content">
        <img src="http://via.placeholder.com/490x400" />
      </div>
      <div class="post__engage">
        <a href="#">Like</a>
        <a href="#">Comment</a>
        <a href="#">Share</a>
      </div>
      <div class="comment">
        <img class="avatar" src="http://via.placeholder.com/50x50" />
        <input type="text" placeholder="Write a comment..">
      </div>
    </article>
		<article class="post">
      <div class="post__header">
        <img class="avatar" src="http://via.placeholder.com/50x50" />
        <div class="post__info">
          <a href="#">User Name</a>
          <span>Just Now</span>
        </div>        
      </div>
      <div class="post__content">
        <img src="http://via.placeholder.com/490x400" />
      </div>
      <div class="post__engage">
        <a href="#">Like</a>
        <a href="#">Comment</a>
        <a href="#">Share</a>
      </div>
      <div class="comment">
        <img class="avatar" src="http://via.placeholder.com/50x50" />
        <input type="text" placeholder="Write a comment..">
      </div>
    </article>
  </section>
  <aside class="side-nav">
    
  </aside>
  <aside class="services">
    
  </aside>
</main>
  
</body>
</html>
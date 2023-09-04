<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/estilo.css">

</head>

<body>
    <header class="cabecalho">
        <div class="btnMenu">
            <button id="toggleButton">Abrir Menu</button>
        </div>
        <div class="pesquisa"> 
            <form action="" method="post">
<input type="text" name="pesquisa">
<input type="submit" value="pesquisar">
</form>
        </div>
        <div class="cabecalhoMenu">
                <div class="headerMenu">
                    <div class="closeMenu">
                        <button id="toggleButton2">Fechar Menu</button>
                    </div>
                    <div class="headerMenuTitle">
                        <h2>
                            <img src="">
                            Olá
                        </h2>
                    </div>
                </div>
                <div class="contentMenu">
                    <ul>
                        <li><a href="perfil.php">Perfil</a></li>
                        <li><a href="ajuda.php">Ajuda</a></li>
                        <li><a href="configuracoes.php">Configurações</a></li>
                        <li><a href="amigos.php">Amigos</a></li>
                        <li><a href="autores.php">Autores</a></li>
                        <li><a href="sobre_nos.php">Sobre nós</a></li>
                        <li><a href="sair.php">Sair</a></li>
                    </ul>
                </div>
            <input type="text" name="pesquisa" id="pesquisa">
            <img url="imagens/teste.png">
        </div>
    </header>
    <main class="principal">
       <?php
       require_once "conexao/conexao.php";
       
       session_start();
  $pesquisa=$_SESSION['pesquisa'];
       $sql="SELECT * FROM livros WHERE nome_livro='$pesquisa'";
       $resultado=$conexao->query($sql);
    $dados=mysqli_fetch_array($resultado);
    $livros = array (
        "nome"=>$dados['nome_livro'],
        "nome_autor"=>$dados['nome_autor'],
        "preco"=>$dados['preco'],

    );
    
       $conexao->close();
       ?>

<script src="script.js"></script>
<div class="livros">
    <h1>
        <?= $livro['nome_livro'];?>
    </h1>
    
</div>
    </main>
</body>
    </html>

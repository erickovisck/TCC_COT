<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets\css/estilo.css">

</head>
<body>
    
<script src="script.js"></script>
<div class="cabecalho">  
<button id="toggleButton">Abrir Menu</button>



    <div id="sidebar">
    <button id="toggleButton2">Fechar Menu</button>
        <ul> 
<h2>
            <img src="">
            Olá <?php
            session_start();

            require_once "conexao/conexao.php";

            $usuario = $_SESSION['usuario'];

            $sql = "SELECT nome_usuario FROM usuario WHERE email = '". $usuario['email']."'";
           
            $resultado = $conexao->query($sql);
            $linha = $resultado->fetch_assoc();
            $nomeUsuario = $linha['nome_usuario'];

            echo $nomeUsuario;

            $conexao->close();
?> 
</h2>
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
<div class="principal">
<div class="banners">
<a href="banners.php">Banners</a>
</div>
<div class="comunidade">  
<a href=""> Comunidade</a>
</div>
<div class="itens">
    <a href="">Itens</a>
</div>
<div class="sugestao">
    <a href=""> Sugestão de livros</a>
    <img href="imagens/carrinho.png">
</div>
</div>
   
</body>
</html>
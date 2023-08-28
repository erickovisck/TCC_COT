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
        <div class="principal">
            <div class="banners">
                <a href="banners.php">Banners</a>
            </div>
            <div class="comunidade">
                <a href="comunidade.php"> Comunidade</a>
            </div>
            <div class="itens">
                <a href="itens.php">Itens</a>
            </div>
            <div class="sugestao">
                <a href="sugestao.php"> Sugestão de livros</a>

            </div>
        </div>
    </main>
    <?php
    session_start();

    require_once "conexao/conexao.php";




    /*    $usuario = $_SESSION['usuario'];

       $sql = "SELECT nome_usuario FROM usuario WHERE email = '". $usuario['email']."'";
      
       $resultado = $conexao->query($sql);
       $linha = $resultado->fetch_assoc();
       $nomeUsuario = $linha['nome_usuario'];
       if(is_null($usuario["email"])){
           session_unset();
       session_destroy();
           header("Location: login.php");
           exit();
       }
       echo $nomeUsuario;

       $conexao->close(); */
    ?>
    <script src="script.js"></script>
</body>

</html>
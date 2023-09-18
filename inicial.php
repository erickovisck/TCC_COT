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
<a href="carrinho.php"> carrinho</a>
</form>
        </div>
        <div class="cabecalhoMenu">
                <div class="headerMenu">
                    <div class="closeMenu">
                        <button id="toggleButton2">Fechar Menu</button>
                    </div>
                    <div class="headerMenuTitle">
                        <h2>
                         
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




       $usuario = $_SESSION["usuario"];
    
       echo $usuario["nome_usuario"]; 

     
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
    <script src="script.js"></script>
</body>

</html>

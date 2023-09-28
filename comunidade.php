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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/comunidade.css">


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
    <!--  fim menu -->
    <main class="principal">
        <form action="" method="post">
            <input type="text" name="mensagem">
            <input type="submit" name="enviar">

        </form>
        <?php 
 if (isset($_POST["enviar"])) {
    $mensagem = $_POST["mensagem"];
    // Verifique se a mensagem não está vazia
    
    if (!$mensagem) {
        echo "mensagem vazia <br><br>";
    }else{
        // A mensagem não está vazia, então insira no banco de dados
        $sql = "INSERT INTO chat_geral (id_usuario, mensagens,  nome_usuario, cont_like) VALUES
            ('" . $usuario['id_usuario'] . "', '$mensagem', '" . $usuario['nome_usuario'] . "', 0)";
        $resultado = $conexao->query($sql);
        if ($resultado) {
            echo "mensagem enviada <br>";
            header("Location: comunidade.php");
            $mensagem="";   
            exit();
          
        } else {
            echo "erro ao enviar". mysqli_error($conexao);
        }
    }
 }
?>
        <main>
            <section class="news-feed">
                <?php 
                 $sql = "SELECT * FROM chat_geral";
                 $resultado = $conexao->query($sql);
                 
if ($resultado) {
    include_once "atualizar_likes.php";
    while ($dados = mysqli_fetch_array($resultado)) {
        echo "<div class='message' data-id='". $dados['id_mensagem'] . "'>";
        ?>
                <article class="post">
                    <div class="post_header">
                        <img src="" alt="" class="avatar">
                        <div class="post_info">
                            <?php echo $dados["nome_usuario"]; ?> 
                            <span> <?php   echo "postado agora";?> </span>
                            <!--    echo $dados["data_mensagem"]. "<br>";  -->


                        </div>
                    </div>
                    <div class="post_content">
                    <?php echo  $dados["mensagens"] . "<br>";?> </div>
                    <div class="post_engage">
                        <?php  echo "<div class='likes'>" . $dados["cont_like"] ."</div> " . " leitores curtiram";  ?>
                    </div>
                    <?php
        echo "<button class='like_button'>Curtir</button>";
        echo "</div>";
    }
 
  ?>
                </article>
            </section>
        </main>
        <?php
 
     // Feche o resultado após o uso
     mysqli_free_result($resultado);
 } else {
     // Lida com erros de consulta, se houverem
     echo "Erro na consulta: " . mysqli_error($conexao);
 }


?>

    </main>
    <script src="js/menulateral.js"></script>
    <script src="js/botaolike.js"></script>
</body>

</html>

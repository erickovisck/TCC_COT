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
    <link rel="stylesheet" href="assets/css/menu.css">


</head>

<body>


<div class="cabecalho">
        <nav role="navigation">
            <div id="menuToggle">

                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>



                <ul id="menu">
                    <h2>Usuário: <?= $usuario['nome_usuario']?> </h2>
                    <li><a href="inicial">Inicial</a></li>
                    <li><a href="perfil.php">Perfil</a></li>
                    <li><a href="ajuda.php">Ajuda</a></li>
                    <li><a href="configuracoes.php">Configurações</a></li>
                    <li><a href="amigos.php">Amigos</a></li>
                    <li><a href="autores.php">Autores</a></li>
                    <li><a href="sobre_nos.php">Sobre nós</a></li>
                    <li><a href="sair.php">Sair</a></li>
                </ul>


            </div>
        </nav>



        <div class="s128">
            <form>
                <div class="inner-form">
                    <div class="row">
                        <div class="input-field first" id="first">
                            <input class="input" id="inputFocus" type="text" placeholder="Keyword" />
                            <button class="clear" id="clear">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path
                                        d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>


    </div>
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
include "atualizar_likes.php";
?>
        <main>
            <section class="news-feed">
                <?php 
                 $sql = "SELECT * FROM chat_geral";
                 $resultado = $conexao->query($sql);
                 
if ($resultado) {

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

$conexao->close();
?>

    </main>
    <script src="js/menulateral.js"></script>
    <script src="js/botaolike.js"></script>
</body>

</html>

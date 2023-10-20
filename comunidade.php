<?php
session_start();

require_once "conexao/conexao.php";

$usuario = $_SESSION["usuario"];



if (is_null($usuario["email"])) {
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
     <title>Comunidade</title>
    <link rel="shortcut icon" href="imagens/logo_projeto.png">
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/comunidade.css">



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
                    <h2>Usuário:
                        <?= $usuario['nome_usuario'] ?>
                    </h2>
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
        <form method="post" action="pessoas.php">
                <div class="inner-form">
                    <div class="row">
                        <div class="input-field first" id="first">
                            <input class="input" id="inputFocus" type="text" placeholder="Pesquisar" name="pesquisarpessoa" />
                            <input type="submit" name="enviar" id="pesqenviar">
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
<!-- FIM MENU -->



            <main class="principal bg-dark">
            <!--<div class="container">
            <div class="row">
                <form action="" method="post">
                    <input type="text" name="mensagem">
                      <input type="submit" name="enviar">
                    

                </form> -->
<div class="container text-center text-bg-dark p-3">
  <div class="row justify-content-center">
                <div class="mb-3 col-md-auto ">
  <label for="exampleFormControlInput1" class="form-label"   >Titulo</label>   
  <input type="email" class="form-control" id="exampleFormControlInput1" >
</div>
<div class="mb-3">
   
  <label for="exampleFormControlTextarea1" class="form-label" name="mensagem" >Mensagem: </label>
  <form action="" method="post">
  <input type="text" class="form-control" name="mensagem" id="exampleFormControlTextarea1" rows="3" placeholder="Bom Dia a todos!!"></input>
  <input class="btn btn-secondary" type="submit" value="enviar" name="enviar">
</form> 
</div>
</div>
</div>
                <?php
                if (isset($_POST["mensagem"])) {
                    $mensagem = $_POST["mensagem"];
                    // Verifique se a mensagem não está vazia
                
                    if (!$mensagem) {
                        echo "mensagem vazia <br><br>";
                    } else {
                        // A mensagem não está vazia, então insira no banco de dados
                        $sql = "INSERT INTO chat_geral (id_usuario, mensagens,  nome_usuario, cont_like, data_mensagem) VALUES
            ('" . $usuario['id_usuario'] . "', '$mensagem', '" . $usuario['nome_usuario'] . "', 0, NOW())";
                        $resultado = $conexao->query($sql);
                        if ($resultado) {
                            echo "mensagem enviada <br>";
                            header("Location: comunidade.php");
                            $mensagem = "";
                            exit();

                        } else {
                            echo "erro ao enviar" . mysqli_error($conexao);
                        }
                    }
                }
                ?>
            </div>
            </div>

            <div class="container text-center text-bg-dark p-3 border border-white">
                <main class="row justify-content-center">
                <div class="col-8 " >
                    <section class="news-feed">
                        <?php
                        $sql = "SELECT * FROM chat_geral";
                        $resultado = $conexao->query($sql);

                        if ($resultado) {


                            while ($dados = mysqli_fetch_array($resultado)) {
                                echo "<div class='message' data-id='" . $dados['id_usuario'] . "'>";
                                $id_usuario=$dados["id_usuario"];
                                ?>
                                <article class="post border border-primary">
                                    <div class="post_header text-start">
                                        <img src="" alt="" class="avatar">
                                        <div class="post_info">
                                          <a href="perfil_pessoa.php?id_usuario='<?=$id_usuario?>'">  <img class="profile-pic" id="iconperfil" src="imagens/teste.jpg" > <?php echo  $dados["nome_usuario"]; ?></a>
                                            <span>
                                                <?php echo "Postado em " . $dados["data_mensagem"]; ?>
                                            </span>
                                            <!--    echo $dados["data_mensagem"]. "<br>";  -->
                                        </div>
                                    </div>
                                    <div class="post_content ">
                                        <?php echo $dados["mensagens"] . "<br>" ?>
                                    </div>
                                    <div class="post_engage row p-3 text-start ">
                                        <?php echo "<div class='likes'>" . $dados["cont_like"] . "</div> " . " leitores curtiram"; ?>
                                    </div>
                                    <?php
                                    echo "<button class='like_button btn btn-primary'><i class='bi bi-hand-thumbs-up'></i></button>";
                                    echo "</div>";

                            }

                            ?>
                            <script>
                            // ...
                
                document.addEventListener("DOMContentLoaded", function () {
                    document.querySelectorAll('.like_button').forEach((button) => {
                        button.addEventListener('click', () => {
                            const messageId = button.parentNode.getAttribute('data-id');
                            const cont_likeElement = button.parentNode.querySelector('.likes');
                            let cont_like = parseInt(cont_likeElement.innerHTML);
                
                            // Verifique se o usuário já deu "like"
                            const hasLiked = button.classList.contains('liked');
                
                            if (hasLiked) {
                                // Remove o "like"
                                cont_like--;
                                button.classList.remove('liked');
                            } else {
                                // Adiciona o "like"
                                cont_like++;
                                button.classList.add('liked');
                            }
                
                            // Enviar cont_like para o PHP usando AJAX
                            const xhr = new XMLHttpRequest();
                            xhr.open('POST', 'atualizar_likes.php');
                            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                            xhr.onload = () => {
                                if (xhr.status === 200) {
                                    // Atualize o valor de cont_like no elemento HTML após a confirmação do servidor
                                    cont_likeElement.innerHTML = cont_like;
                                } else {
                                    // Lida com erros, se houverem
                                    console.error('Erro na solicitação AJAX');
                                }
                            };
                
                            // Crie uma string de dados a serem enviados
                            const data = `id_mensagem=${messageId}&cont_like=${cont_like}`;
                
                            xhr.send(data);
                        });
                    });
                });
                 </script>
                 <?php
                            ?>
                                <?php


                                // Feche a conexão com o banco de dados
                            

                                ?>
                            </article>
                        </section>
                </div>
                
                    </main>
                    </div>
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
           
</body>

</html>

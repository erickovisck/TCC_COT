<?php
session_start();

require_once "conexao/conexao.php";

//ARRUMAR BANCO//
$dupl = "DELETE FROM `seguir` WHERE id_seguido = 0";
$dupl2 = $conexao->query($dupl);
$iddados=$_SESSION["idUsuario"];
echo $iddados;
$usuario = $_SESSION["usuario"];
if ($usuario["id_usuario"] == $iddados) {
    header("Location:perfil.php");
}




if (is_null($usuario["email"])) {
    session_unset();
    session_destroy();
    header("Location: Login.php");
    exit();
}
//echo $nomeUsuario;
if (isset($_POST["pesquisar"])) {
    $pesquisa = $_POST["pesquisar"];
    $_SESSION['pesquisar'] = $pesquisa;
    /*     include_once "pesquisa.php"; */
}

$sql = "SELECT * FROM usuario where id_usuario = $iddados";
$resultado = $conexao->query($sql);
if ($resultado) {
    echo "USUARIO ENCONTRADO";
    $dados = mysqli_fetch_array($resultado);
    

} else {
    echo "usuario nao";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">

    <title>Document</title>
    <link rel="stylesheet" href="assets/css/estilo.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">


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

    <main class="principal">
        <form action="" method="post">
            <input type="text" class="form-control" name="mensagempessoal" id="exampleFormControlTextarea1" rows="3"
                placeholder="Bom Dia a todos!!"></input>
            <input class="btn btn-secondary" type="submit" value="enviar" name="enviar">
        </form>
  

<!--         <img src="<?=$dados["img_perfil "]?>" alt="" class="avatar"> -->
        <?php
         $datapost = date('y/m/d' );
         echo $dados["nome_usuario"];
  if (isset($_POST["mensagempessoal"])) {
    $mensagem = $_POST["mensagempessoal"];
    // Verifique se a mensagem não está vazia

    if (!$mensagem) {
        echo "mensagem vazia <br><br>";
    } else {
        // A mensagem não está vazia, então insira no banco de dados
       
        $sql = "INSERT INTO chat_privado (id_enviou, mensagem,  id_recebeu, id_usuario, data_mensagem) VALUES
('" . $usuario['id_usuario'] . "', '$mensagem', '$iddados', ".$usuario["id_usuario"].", NOW())";
        $resultado = $conexao->query($sql);
        if ($resultado) {
            echo "mensagem enviada <br>";
            $mensagem = "";
            header("Location: mensagem.php");
            exit();

        } else {
            echo "erro ao enviar" . mysqli_error($conexao);
        }
    }
}
$sql = "SELECT * FROM chat_privado WHERE id_recebeu=".$usuario["id_usuario"]." AND id_enviou=$iddados";
$resultado = $conexao->query($sql);
$sql2 = "SELECT * FROM chat_privado WHERE id_enviou=".$usuario["id_usuario"]." AND id_recebeu=$iddados";
$resultado2 = $conexao->query($sql2);

if ($resultado || $resultado2) {


    while ($dados = mysqli_fetch_array($resultado)) {
        echo "<div class='' data-id='" . $dados['id_recebeu'] . "'>";
        $id_usuario=$dados["id_recebeu"];
        ?>

        <img src="" alt="" class="avatar">

        <span>
            <?php echo ""; ?>
        </span>
        <!--    echo $dados["data_mensagem"]. "<br>";  -->
        </div>
        </div>
        <div class="recebeu">
            <?php echo $dados["mensagem"] ."Enviada em ".$dados["data_mensagem"]."". "<br>" ?>
        </div>
     
        <?php
            echo "</div>";

    }

    while ($dados = mysqli_fetch_array($resultado2)) {
        echo "<div class='' data-id='" . $dados['id_enviou'] . "'>";
        $id_usuario=$dados["id_enviou"];
        ?>

        <img src="" alt="" class="avatar">

        <span>
            <?php echo ""; ?>
        </span>
        <!--    echo $dados["data_mensagem"]. "<br>";  -->
        </div>
        </div>
        <div class="enviou">
        <?php echo $dados["mensagem"] ." Enviada em ".$dados["data_mensagem"]."". "<br>" ?>
        </div>
      
        <?php
            echo "</div>";

    }
}
    ?>
        <script>
        // ...

        document.addEventListener("DOMContentLoaded", function() {
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


    </main>
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>Sobre</h6>
                    <p class="text-justify">O desenvolvimento deste site se tornou necessário após uma breve pesquisa
                        sobre sites com o mesmo propósito, contudo, percebemos que estes sites são quase inexistentes.
                        Visando isso, decidimos fazer um site com mais reconhecimento para autores nacionais e para que
                        mais pessoas possam ter gosto pela leitura.</p>
                </div>
                <div class="col-xs-6 col-md-3">
                    <h6>Links Rapidos</h6>
                    <ul class="footer-links">
                        <li><a href="#">Sobre nos</a></li>
                        <li><a href="#">Fale conosco</a></li>
                        <li><a href="#">Politica de Privacidade</a></li>
                        <li><a href="#">Termos</a></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by
                        <a href="#">Scanfcode</a>.
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <?php

    ?>
</body>

</html>

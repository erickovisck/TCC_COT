<?php
session_start();

require_once "conexao/conexao.php";

//ARRUMAR BANCO//
$dupl = "DELETE FROM `seguir` WHERE id_seguido = 0";
$dupl2 = $conexao->query($dupl);
$iddados = isset($_GET["id_usuario"]) ? $_GET["id_usuario"] : $_SESSION["iddados"];
echo "<br>";
$usuario = $_SESSION["usuario"]; $usu= "SELECT * FROM usuario WHERE email='".$usuario["email"]."'";
$resultado = $conexao->query($usu);
$usuario = mysqli_fetch_array($resultado);
$_SESSION["usuario"]=$usuario;
$usu = "SELECT * FROM usuario WHERE email=" . $usuario["email"] . "";
$resultado = $conexao->query($usu);
$usuario = mysqli_fetch_array($resultado);
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
    <link rel="shortcut icon" href="imagens/logo_projeto2.png">

    <title>Chat</title>
    <link rel="stylesheet" href="assets/css/mensagem.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


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
                <h2><a href="perfil.php"><i class="bi bi-person-circle"> </i>
                    <?= $usuario['nome_usuario'] ?></a>
                    </h2>                    <li><a href="inicial.php">Inicial</a></li>
                    <li><a href="comunidade.php">Comunidade</a></li>
                    <li><a href="Amigos.php">Amigos</a></li>
                    <li><a href="carrinho.php">Carrinho</a></li>
                    <li><a href="autores.php">Autores</a></li>
                    <li><a href="https://mail.google.com/mail/u/0/?fs=1&tf=cm&source=mailto&to=creatorsofthought@gmail.com">Ajuda</a></li>
                    <li><a href="sobre_nos.php">Sobre nós</a></li>
                    <li><a href="sair.php">Sair</a></li>
                </ul>


            </div>
        </nav>






    </div>

    <main class="mensagens container">



        <h2 id="nomeuser"> <img class="profile-pic" id="iconperfil" src="<?= $dados["img_perfil"] ?>">
            <?= $dados["nome_usuario"] ?>
        </h2>


        <div class="chat-container">
            <?php
            $datapost = date('y/m/d');
            if (isset($_POST["mensagempessoal"])) {
                $mensagem = $_POST["mensagempessoal"];
                // Verifique se a mensagem não está vazia
            
                if (!$mensagem) {
                    echo "mensagem vazia <br><br>";
                } else {
                    // A mensagem não está vazia, então insira no banco de dados
            
                    $sql = "INSERT INTO chat_privado (id_enviou, mensagem,  id_recebeu, id_usuario, data_mensagem) VALUES
('" . $usuario['id_usuario'] . "', '$mensagem', '$iddados', " . $usuario["id_usuario"] . ", NOW())";
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



            // Consulta SQL para obter todas as mensagens relacionadas a essa conversa, ordenadas da mais recente para a mais antiga
            $sql = "SELECT * FROM chat_privado WHERE (id_recebeu = " . $usuario["id_usuario"] . " AND id_enviou = $iddados) OR (id_enviou = " . $usuario["id_usuario"] . " AND id_recebeu = $iddados) ORDER BY data_mensagem ASC";
            $resultado = $conexao->query($sql);

            if ($resultado) {
                while ($dados = mysqli_fetch_array($resultado)) {
                    echo "<div class='id' data-id='" . $dados['id_enviou'] . "'></div>";
                    $id_usuario = $dados["id_enviou"];

                    if ($dados["id_enviou"] == $usuario["id_usuario"]) {
                        // Se a mensagem foi enviada pelo usuário atual
                        echo "<div class='enviou col'>";
                        echo "<div class='btn btn-secondary btn-sm'>" . $dados["mensagem"] . "</div><br>" . "<div id='horario'> " . substr($dados["data_mensagem"], 10) . '</div>';
                        echo "</div>";
                    } else {
                        // Se a mensagem foi recebida pelo usuário atual
                        echo "<div class='recebeu col-md-4'>";
                        echo "<div class='btn btn-primary btn-sm'>" . $dados["mensagem"] . "</div><br>" . "<div id='horario'> " . substr($dados["data_mensagem"], 10) . '</div>';
                        echo "</div>";
                    }
                }
            }


            ?>
        </div>


        </div>
        <form action="" method="post" class="mt-3">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="mensagempessoal" placeholder="Enviar mensagem">
                <button class="btn btn-secondary" type="submit" name="enviar">Enviar</button>
            </div>
        </form>
    </main>

    <?php

    ?>
</body>

</html>

<?php
session_start();

require_once "conexao/conexao.php";

//ARRUMAR BANCO//
$dupl = "DELETE FROM `seguir` WHERE id_seguido = 0";
$dupl2 = $conexao->query($dupl);

$usuario = $_SESSION["usuario"];
if ($usuario["id_usuario"] == $_GET["id_usuario"]) {
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
$iddados = $_GET["id_usuario"];
echo $iddados;
$sql = "SELECT * FROM usuario where id_usuario = $iddados";
$resultado = $conexao->query($sql);
if ($resultado) {
    echo "USUARIO ENCONTRADO";
    $dados = mysqli_fetch_array($resultado);
    $idUsuario = $dados['id_usuario'];
    $_SESSION["idUsuario"]=$idUsuario;


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

    <title>Leitor</title>
    <link rel="shortcut icon" href="imagens/logo_projeto2.png">
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


</head>

<body>
    <!-- começo cabeçalho -->
    <div class="cabecalho">
        <nav role="navigation">
            <div id="menuToggle">

                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>



               <h2><a href="perfil.php"><i class="bi bi-person-circle"><?= $usuario['nome_usuario'] ?></a></i></h2> 
                    <li><a href="perfil.php">Perfil</a></li>
                    <li><a href="ajuda.php">Ajuda</a></li>
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
<!-- fim cabeçalho -->


    <main class="principal">
<div class="container p-4" style="border: 1px solid #191825;  background-color: #191825; width: 700px; height: 500px;
    color: white;
    margin-top: 100px;
    border-radius: 4%">
    <div class="row">
     <div class="col   p-4">
           <img class="profile-pic" id="iconperfil" src="<?=$dados["img_perfil"]?>">


       <h1 style="font-size: 30px; padding: 4px; margin-left: 8%;"> <?= $dados["nome_usuario"] ?>  </h1>
        <h2 style="font-size:20px; font-weight: bold; padding:8px; margin-top:30px"> Bio</h2>
        <p style="font-size:20px;">
            <?= $dados["biografia"] ?>
            

        </p>
        
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            const seguirButton = document.getElementById('meuBotao');
            const contSeguindoElement = document.querySelector('h4');
            const hasSeguido = seguirButton.classList.contains('seguido');

            seguirButton.addEventListener('click', () => {
                const idUsuario = <?= $dados["id_usuario"] ?>;
                const seguir = !hasSeguido;

                if (seguir) {
                    seguirButton.classList.add('seguido');
                } else {
                    seguirButton.classList.remove('seguido');
                }

                // Enviar a ação para a mesma página usando AJAX
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'perfil_pessoa.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = () => {
                    if (xhr.status === 200) {
                        // Atualize o valor no elemento HTML após a confirmação do servidor
                        // Isso pode ser feito no retorno da resposta do servidor
                        console.log('Ação de seguir realizada com sucesso.');
                    } else {
                        // Lida com erros, se houverem
                        console.error('Erro na solicitação AJAX');
                    }
                };

                // Crie uma string de dados a serem enviados
                const data = `seguir=${seguir ? 'true' : 'false'} seguido=${}`;

                xhr.send(data);
            });
        });
        </script>
        </div>
        <div class="col   p-4">
        <?php

$seguir = isset($_POST['seguir']) ? true : false;
$idUsuario = $_SESSION['idUsuario']; // Certifique-se de que a variável $idUsuario está definida

// Verifique se o usuário está logado (você pode personalizar essa verificação)
if (isset($_SESSION['usuario'])) {
    $verific = "SELECT * FROM seguir WHERE id_seguido = '$idUsuario' AND id_seguidor = '" . $usuario["id_usuario"] . "'";
    $result = $conexao->query($verific);

    if ($result && $result->num_rows > 0) {
        $seguindosn = "seguir";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($seguir) {
                $sql = "DELETE FROM seguir WHERE id_seguido = $idUsuario AND id_seguidor = " . $usuario["id_usuario"];
                if ($conexao->query($sql) === true) {
                    // Redirecione para a mesma página para atualizar a exibição
                } else {
                    echo "Erro";
                }
            }
        }
    } else {
        $seguindosn = "seguindo";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($seguir) {
                $sql = "INSERT INTO seguir (id_seguido, id_seguidor) VALUES ('$idUsuario', '" . $usuario["id_usuario"] . "')";
                if ($conexao->query($sql) === true) {
                    // Redirecione para a mesma página para atualizar a exibição
                } else {
                    echo "Erro";
                }
            }
        }
    }
} else {
    echo "Usuário não autenticado. Faça o login para seguir.";
}


        $seguirverifi = "SELECT * FROM seguir WHERE id_seguido = $idUsuario";
        $resulseguir = $conexao->query($seguirverifi);
        $seguidores = 0;
        while ($dados = mysqli_fetch_array($resulseguir)) {
            $seguidores++;
        }
        $seguirverifi2 = "SELECT * FROM seguir WHERE id_seguidor = $idUsuario";
        $resulseguir2 = $conexao->query($seguirverifi2);
        $seguindo = 0;
        while ($dados = mysqli_fetch_array($resulseguir2)) {
            $seguindo++;
        }
        ?>




       
        <h4 style="text-align: center;"> <a href="seguir.php?seguir=1" class="btn btn-outline-light" style="border:0px;" role="button"> Seguidores </a>
      <?= $seguidores ?> 
        </h4>




        <form method="post" action="" style="text-align: center;">
            <button type="submit" name="seguir" id="meuBotao" class="btn btn-outline-success" style="margin-top: 300px; font-size: 20px; height: 40px; color: white; font-weight: bold; border: 0px;
            background-color: purple; width: 110px;">
                <?= $seguindosn ?>
            </button>
        </form>
    </div>
    <div class="col   p-4">
        <h4 style="text-align: center;"><a href="seguir.php?seguir=2" class="btn btn-outline-light" style="border:0px;"> Seguindo </a> <br>
            <?= $seguindo ?>
            </h4>
            <div>
            <a class="btn btn-primary" role="button" href="mensagem.php" style="    margin-top: 300px; margin-left: 100px; height: 40px;text-align: center; font-size: 20px; font-weight: bold;"> Chat</a>
    </div>
    </div>
    </div>
    </div>


    </main>





    <!-- rodapé -->
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
                        <li><a class="facebook" href="#"><i class="bi bi-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="bi bi-twitter"></i></a></li>
                        <li><a class="dribbble" href="#"><i class="bi bi-instagram"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="bi bi-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <?php

    ?>
</body>

</html>

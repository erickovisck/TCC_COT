<?php
session_start();

require_once "conexao/conexao.php";




$usuario = $_SESSION["usuario"];
if($usuario["id_usuario"]==$_GET["id_usuario"]){
    header ("Location:perfil.php");
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
$iddados=$_GET["id_usuario"];
echo $iddados;
$sql="SELECT * FROM usuario where id_usuario = $iddados";
$resultado = $conexao->query($sql);
if ($resultado) {
    echo "USUARIO ENCONTRADO";
    $dados = mysqli_fetch_array($resultado);
   

}else{
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
            <form method="post" action="itens.php">
                <div class="inner-form">
                    <div class="row">
                        <div class="input-field first" id="first">

                            <input class="input" id="inputFocus" type="text" placeholder="Pesquisar" name="pesquisar"/>
                            <input  type="submit" name="enviar" id="pesqenviar">


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
        <img> 
<h1> <?= $dados["nome_usuario"]?></h1>
<h2> Bio</h2>


    <p><?= $dados["biografia"]?> </p>
<h4> Seguidores <?= $dados["cont_seguidores"]?> </h4>
<form method="post" action="">
    <button type="submit" name="seguir" id="meuBotao">Seguir</button>
</form>
<h4>Seguindo <?= $dados["cont_seguindo"]?></h4>

    <?php

    ?>
    <script>
   document.addEventListener("DOMContentLoaded", function () {
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
        const data = `seguir=${seguir ? 'true' : 'false'}`;

        xhr.send(data);
    });
});

    </script>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['seguir'])) {
        // Verifique se o usuário está logado (você pode personalizar essa verificação)
        if (isset($_SESSION['usuario'])) {
            $idUsuario = $dados['id_usuario'];
            $seguir = isset($_POST['seguir']) ? true : false;


            

            if ($seguir) {
                // Ação para seguir
                $sql = "UPDATE usuario SET cont_seguidores = cont_seguidores + 1 WHERE id_usuario = $idUsuario";
            } else {
                // Ação para deixar de seguir
                $sql = "UPDATE usuario SET cont_seguindo = cont_seguindo - 1 WHERE id_usuario = $idUsuario";
            }

            if ($conexao->query($sql) === true) {
                // Redirecione para a mesma página para atualizar a exibição
                exit;
            } else {
                echo "Erro na atualização da ação de seguir: " . $conexao->error;
            }

            $conexao->close();
        } else {
            echo "Usuário não autenticado. Faça o login para seguir.";
        }
    }
}
?>

<h4>Seguindo <?= $dados["cont_seguindo"] ?></h4>
<form method="post" action="">
    <button type="submit" name="seguir" id="meuBotao">Seguir</button>
</form>


</main>
<footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>Sobre</h6>
          <p class="text-justify">O desenvolvimento deste site se tornou necessário após uma breve pesquisa sobre sites com o mesmo propósito, contudo, percebemos que estes sites são quase inexistentes. Visando isso, decidimos fazer um site com mais reconhecimento para autores nacionais e para que mais pessoas possam ter gosto pela leitura.</p>
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

$conexao->close();
                ?>
</body>
</html>

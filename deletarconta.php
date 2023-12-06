<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">
   <title>Deletar conta</title>
   <link rel="shortcut icon" href="imagens/logo_projeto2.png">
    <link rel="stylesheet" href="assets/css/estilo.css">
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
                    </h2>                    <li><a href="inicial">Inicial</a></li>
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



        <div class="s128">
            <form method="post" action="itens.php">
                <div class="inner-form">
                    <div class="row">
                        <div class="input-field first" id="first">

                            <input class="input" id="inputFocus" type="text" placeholder="Pesquisar" name="pesquisar" />
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
<div class="container text-center"  style="border: 1px solid #191825;  background-color: #191825; width: 700px; height: 500px;
    color: white;
    margin-top: 100px;
    border-radius: 4%">
<div class="row">
    <div class="col">

<h1 class="delconta">Deletar conta</h1>
                <form action="" method="POST">
                
                    <div class="atnome">
                        <label for="alt_nome">
                            E-mail <br>
                            <input type="text" name="email">
                        </label>
                    </div>
                   <br>
                       <div class="atnome">
                        <label for="alt_nome">
                            Senha <br>
                            <input type="password" name="senha">
                        </label>
                    </div>
                    <br>
                    <div class="atnome">
                        <label for="alt_nome">
                            Confirme a senha <br>
                            <input type="password" name="csenha">
                        </label>
                     
                    </div>
                    <br>
                    <div class="atconfirmar">
                   <input type="submit" name="confirmar" class="btn btn-danger">
                    </div>
                </form>
    
           
    </div>
    </div>
</div>
</main>
    <?php
require_once "conexao/conexao.php";
session_start();
$usuario = $_SESSION['usuario'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $demail = $_POST["email"];
    $dsenha = $_POST["senha"];
    $dcsenha = $_POST["csenha"];
    
    if ($dsenha == $dcsenha) {
        if ($demail == $usuario['email'] && $dsenha == $usuario['senha']) {
            $sql = "DELETE FROM usuario WHERE email = '$demail' AND senha = '$dsenha'";
            $resultado = $conexao->query($sql);
            
            if ($resultado) {
                echo"<script language='javascript' type='text/javascript'>alert('Conta deletada')
                ;window.location.href='Login.php'</script>";
            } else {
                 echo"<script language='javascript' type='text/javascript'>alert('Erro ao deletar a conta')
                ;window.location.href='deletarconta.php'</script>";
            }
        } else {
            echo"<script language='javascript' type='text/javascript'>alert('Senha ou email incorretos.')
            ;window.location.href='deletarconta.php'</script>";
        }
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Senhas não coincidem.')
        ;window.location.href='deletarconta.php'</script>";
    }
}
?>
</main>
    <!-- Site footer -->
    <footer class="site-footer mt-5 ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>Sobre</h6>
                    <p class="text-justify">O desenvolvimento deste site se tornou necessário após uma breve
                        pesquisa
                        sobre sites com o mesmo propósito, contudo, percebemos que estes sites são quase
                        inexistentes.
                        Visando isso, decidimos fazer um site com mais reconhecimento para autores nacionais e para
                        que
                        mais pessoas possam ter gosto pela leitura.</p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Links Rapidos</h6>
                    <ul class="footer-links">
                        <li><a href="sobre_nos.php">Sobre nos</a></li>
                        <li><a href="#">Fale conosco</a></li>
                        <li><a href="politicas.html">Politica de Privacidade</a></li>
                        <li><a href="politicas.html">Termos</a></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">

                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="bi bi-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="bi bi-twitter"></i></a></li>
                        <li><a class="insta" href="https://instagram.com/creatorsofthought?igshid=MzRlODBiNWFlZA"><i
                                    class="bi bi-instagram"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="bi bi-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


    <script src="js/script.js"></script>
</body>
</html>

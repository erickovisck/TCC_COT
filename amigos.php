
<?php
session_start();

require_once "conexao/conexao.php";

$usuario=$_SESSION["usuario"];

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
    <link rel="shortcut icon" href="imagens/logo_projeto2.png">
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
        <main class="principal bg-body-tertiary">
            <div class="container my-5">
            
        <?php
        
// Users whom I follow
$sql_following = "SELECT * FROM seguir WHERE id_seguidor=" . $usuario["id_usuario"];
$result_following = $conexao->query($sql_following);
echo"<h2> Seguindo </h2>";
while ($data_following = mysqli_fetch_array($result_following)) {
    $sql_user_following = "SELECT * FROM usuario WHERE id_usuario = " . $data_following["id_seguido"];
    $result_user_following = $conexao->query($sql_user_following);
    $user_following = mysqli_fetch_array($result_user_following);

    ?><ul class="list-group list-group-flush">
      <li class="list-group-item"><a href="perfil_pessoa.php?id_usuario=<?=$user_following["id_usuario"]?>">
        <img class="profile-pic" id="iconperfil" src="<?=$user_following["img_perfil"]?>">
        <?php echo $user_following["nome_usuario"]; ?>
        
    </a></li><br> <?php
}


// Users who follow me
$sql_followers = "SELECT * FROM seguir WHERE id_seguido=" . $usuario["id_usuario"];
$result_followers = $conexao->query($sql_followers);
echo "<h2> Seguidores </h2>";
while ($data_followers = mysqli_fetch_array($result_followers)) {
    $sql_user_followers = "SELECT * FROM usuario WHERE id_usuario = " . $data_followers["id_seguidor"];
    $result_user_followers = $conexao->query($sql_user_followers);
    $user_followers = mysqli_fetch_array($result_user_followers);

    ?><ul class="list-group list-group-flush">
    <li class="list-group-item"><a href="perfil_pessoa.php?id_usuario=<?=$user_followers["id_usuario"]?>">
        <img class="profile-pic" id="iconperfil" src="<?=$user_followers["img_perfil"]?>">
        <?php echo $user_followers["nome_usuario"]; ?>
    </a></li><br> <?php
}
?>
</div>

        </main>

        <!-- footer -->
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
                        <li><a href="sobre_nos.php">Sobre nós</a></li>
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
           </body>
           
           </html>
           

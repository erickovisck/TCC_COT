<?php
session_start();

require_once "conexao/conexao.php";

//ARRUMAR BANCO//
$dupl = "DELETE FROM `seguir` WHERE id_seguido = 0";
$dupl2 = $conexao->query($dupl);

$usuario=$_SESSION["usuario"];
$usu= "SELECT * FROM usuario WHERE email='".$usuario["email"]."'";
$resultado = $conexao->query($usu);
$usuario = mysqli_fetch_array($resultado);



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

$iddados = isset($_GET["id_usuario"]) ? $_GET["id_usuario"] : $_SESSION["iddados"];
echo"<br>";

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
    <title>Seguidores/Seguindo</title>
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
        $seguir=$_GET["seguir"];
      
        
        if ($seguir == 1) { // Use "==" para comparar, em vez de "="
            $sql = "SELECT id_seguidor FROM seguir WHERE id_seguido = $iddados";
            $resultado = $conexao->query($sql);
            while ($dados = mysqli_fetch_array($resultado)) {
                $sql2 = "SELECT * FROM usuario WHERE id_usuario = " . $dados["id_seguidor"];
                $resultado2 = $conexao->query($sql2);
                $dados3 = mysqli_fetch_array($resultado2);
                ?>
                <ul class="list-group list-group-flush">
    <li class="list-group-item"><a href="perfil_pessoa.php?id_usuario=<?=$dados3["id_usuario"]?>">
        <img class="profile-pic" id="iconperfil" src="<?=$dados3["img_perfil"]?>">
        <?= $dados3["nome_usuario"] ?>
    </a></li><br>
<?php
            }
        } elseif ($seguir == 2) { // Use "==" para comparar, em vez de "="
            $sql = "SELECT id_seguido FROM seguir WHERE id_seguidor = $iddados";
            $resultado = $conexao->query($sql);
            while ($dados = mysqli_fetch_array($resultado)) {
                $sql2 = "SELECT * FROM usuario WHERE id_usuario = " . $dados["id_seguido"];
                $resultado2 = $conexao->query($sql2); // Use $resultado2 em vez de $resultado3
                $dados4 = mysqli_fetch_array($resultado2); // Use $dados4 em vez de $dados3
            ?>

                <ul class="list-group list-group-flush">
                <li class="list-group-item"> <a href="perfil_pessoa.php?id_usuario=<?=$dados4["id_usuario"]?>">
                    <img class="profile-pic" id="iconperfil" src="<?=$dados4["img_perfil"]?>">
                    <?= $dados4["nome_usuario"]; ?>
                </a></li><br>
            <?php
            }
        }
        
        ?>
        </div>
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
                        <li><a href="sobre_nos.php">Sobre nos</a></li>
                        <li><a href="https://mail.google.com/mail/u/0/?fs=1&tf=cm&source=mailto&to=creatorsofthought@gmail.com">Fale conosco</a></li>
                        <li><a href="politica.html">Poliítica de Privacidade</a></li>
                        
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2023 Todos os direitos reservados para
                        <a href="#">Creators of Thought</a>.
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="https://www.facebook.com/share/NL9fR7nrcNKsgbtW/"><i class="bi bi-facebook"></i></a></li>
                        <li><a class="twitter" href="https://x.com/creababyohw?s=20"><i class="bi bi-twitter"></i></a></li>
                        <li><a class="insta" href="https://instagram.com/creatorsofthought?igshid=MzRlODBiNWFlZA"><i
                                    class="bi bi-instagram"></i></a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <?php

    ?>
</body>

</html>

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
//echo $nomeUsuario;
if (isset($_POST["pesquisar"])) {
    $pesquisa = $_POST["pesquisar"];
    $_SESSION['pesquisar'] = $pesquisa;
/*     include_once "pesquisa.php"; */
}
$conexao->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">

    <title>Document</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
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
                    <h2>Usuário:
                        <?= $usuario['nome_usuario'] ?>
                    </h2>
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
        <!--START OF PAGE BANNER-->
        <div id="page_banner">
            <div id="banner">
                <div id="msg_box">

                    <p class="summer_s">Confira nossos Livros</p>
                    <h1 id="seventy_p">Compre agora!</h1>
                    <!--                     <p class="promo_c">Melhores preços aqui!</p> -->
                    <a href="itens.php"><button id="shop_now" type="submit" name="shop now" onclick="change()">Comprar
                            <i class="fa-solid fa-arrow-right"></i></button> </a>
                </div>
            </div>
        </div>
        <!--END OF PAGE BANNER-->
        <!--START OF FIRST PRODUCTS GIRD-->
        <div id="grid_f">
            <div id="pro1" class="pro">
                <div id="msg">
                    <a href="comunidade.php"><button id="shop_now" type="submit" name="shop now"
                            onclick="change()">Comunidade <i class="fa-solid fa-arrow-right"></i></button> </a>
                    <!--                     <span class="shop_n animate__slideOutRight">Shop Now <i class="fa-solid fa-arrow-right"></i></span> -->
                </div>
            </div>
            <div id="pro2" class="pro">
                <div id="msg">
                    <a href="itens.php"><button id="shop_now" type="submit" name="shop now" onclick="change()">Itens <i
                                class="fa-solid fa-arrow-right"></i></button> </a>
                    <!--  <span class="shop_n">Shop Now <i class="fa-solid fa-arrow-right"></i></span> -->

                </div>
            </div>
            <div id="pro3" class="pro">
                <div id="msg">
                    <a href="sugestao.php"><button id="shop_now" type="submit" name="shop now"
                            onclick="change()">Sugestão <i class="fa-solid fa-arrow-right"></i></button> </a>
                    <!--  <span class="shop_n">Shop Now <i class="fa-solid fa-arrow-right"></i></span> -->

                </div>
            </div>
        </div>
        <!--END OF FIRST PRODUCTS GIRD-->
    </main>
    <!-- Site footer -->
    <!--    <footer class="site-footer">
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
                        <li><a href="http://scanfcode.com/about/">Sobre nos</a></li>
                        <li><a href="http://scanfcode.com/contact/">Fale conosco</a></li>
                        <li><a href="http://scanfcode.com/privacy-policy/">Politica de Privacidade</a></li>
                        <li><a href="http://scanfcode.com/sitemap/">Termos</a></li>
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
    </footer> -->
    <script>
    var btnDelete = document.getElementById('clear');
    var inputFocus = document.getElementById('inputFocus');
    //- btnDelete.on('click', function(e) {
    //-   e.preventDefault();
    //-   inputFocus.classList.add('isFocus')
    //- })
    //- inputFocus.addEventListener('click', function() {
    //-   this.classList.add('isFocus')
    //- })
    btnDelete.addEventListener('click', function(e) {
        e.preventDefault();
        inputFocus.value = ''
    })
    document.addEventListener('click', function(e) {
        if (document.getElementById('first').contains(e.target)) {
            inputFocus.classList.add('isFocus')
        } else {
            // Clicked outside the box
            inputFocus.classList.remove('isFocus')
        }
    });
    </script>
    <script src="js/extesion/choices.js"></script>
    <script src="js/extesion/custom-materialize.js"></script>
    <script src="js/extention/flatpickr.js"></script>
    <script src="js/main" .js></script>
</body>

</html>

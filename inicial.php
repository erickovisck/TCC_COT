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

 <title>Inicial</title>

    <link rel="shortcut icon" href="imagens/logo_empresa.jpg">
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
        <div class="container-fluid">
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
        </div>
        <!--END OF PAGE BANNER-->
        <!-- START FIRST CAROUSEL -->
    <div class="carrossel_inicial bg-body-secondary">
  <div class="container p-4 ">
  <div id="carouselExampleDark" class="carousel carousel-dark slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Feditorialpaco.com.br%2Fquais-sao-as-partes-de-um-livro-impresso%2F&psig=AOvVaw01KSfLJZ8FgcFOd9g8-9zM&ust=1697977423627000&source=images&cd=vfe&opi=89978449&ved=0CA8QjRxqFwoTCJDpl_uQh4IDFQAAAAAdAAAAABAG" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="https://editorialpaco.com.br/wp-content/uploads/2019/07/c8c74d9bca132ddb5e608bb5b212b386.jpg" class="d-block w-100 " alt="...">
      <div class="carousel-caption d-none d-md-block">
       <!-- texto adiciona aqui -->
      </div>
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>

    </div>
  </div>
  </div>
    </main>
    <!-- Site footer -->

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
            <li><a class="dribbble" href="https://instagram.com/creatorsofthought?igshid=MzRlODBiNWFlZA"><i class="bi bi-instagram"></i></a></li>
            <li><a class="linkedin" href="#"><i class="bi bi-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

<script src="style.js"></script>
</body>
</html>






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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/extesion/choices.js"></script>
    <script src="js/extesion/custom-materialize.js"></script>
    <script src="js/extention/flatpickr.js"></script>
    <script src="js/main" .js></script>
</body>

</html>

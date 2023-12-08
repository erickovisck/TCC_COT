<?php
session_start();

require_once "conexao/conexao.php";

$api_key='AIzaSyBHe1XX1RdFudsmfRaHaAkKlzIz7wDao9k';

/*CHAVE RESERVA 
$api_key='AIzaSyDD7Cx-7wsL0KQ1avM_vlj_x_GWTXJbiro'
$api_key='AIzaSyAPwKI4X48Ju3lA6FJK1PHcu8nLEgcuOJ0'
$api_key='AIzaSyBHe1XX1RdFudsmfRaHaAkKlzIz7wDao9k'
*/
$_SESSION["api_key"]=$api_key;


$usuario = $_SESSION["usuario"]; $usu= "SELECT * FROM usuario WHERE email='".$usuario["email"]."'";
$resultado = $conexao->query($usu);
$usuario = mysqli_fetch_array($resultado);
$_SESSION["usuario"]=$usuario;



//echo $nomeUsuario;
if (isset($_POST["pesquisar"])) {
    $pesquisa = $_POST["pesquisar"];
    $_SESSION['pesquisar'] = $pesquisa;
/*     include_once "pesquisa.php"; */
}
?>
<?php 
$principal=[9788581051529,
9781401271701,
9788560018000,
9781526019073,
9788583861799,
9789878151922,
9788576835196,
9788550303635,
9786555600155,
1974709930,
9786555603033

];

            ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">

    <title>Inicial</title>

    <link rel="shortcut icon" href="imagens/logo_projeto2.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/estilo.css">

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
                    </h2>                  
                    <li><a href="inicial.php">Inicial</a></li>
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
        <!--START OF PAGE BANNER-->
        <div class="container-fluid ">
            <div id="page_banner">
                <div id="banner">
                    <div id="msg_box">

                        <p class="summer_s">Confira nossos Livros</p>
                        <h1 id="seventy_p">Compre agora!</h1>
                        <!--                     <p class="promo_c">Melhores preços aqui!</p> -->
                        <a href="itens.php"><button id="shop_now" type="submit" name="shop now"
                                onclick="change()">Comprar
                                <i class="bi bi-bag-fill"></i></button> </a>
                    </div>
                </div>
            </div>
        </div>
        <!--END OF PAGE BANNER-->
        <hr class="divisor my-5">

        <h1 class="text-center"> Escolhas da COT</h1>
    <h2 class="text-center"><a href="autores.php" >Quer divulgar suas obras aqui? </a></h2>
        <div id="carouselExample" class="carousel carousel-dark slide">
            <div class="carousel-inner">
                <?php
                $escolhas="SELECT * FROM livros2";
                $escolharesul=$conexao->query($escolhas);
                while($livro2=mysqli_fetch_array($escolharesul)){
                    ?>
                    <div class="carousel-item active ">
                    <div class="card">
                        <div class="img-wrapper">
                        <a class="link_card" href="livro.php?id_livro2=<?= $livro2["id_livro2"] ?>">
                        <img class="h-40" src="<?= $livro2["img_livro2"] ?>">
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                <?=$titulo= $livro2["titulo"]?> 
                            </h5>

                        </div>
                    </div>
                </div>
                <?php
                }
            foreach ($principal as $prin){

$url = "https://www.googleapis.com/books/v1/volumes?q=isbn:$prin&key=" . $api_key;
$response = file_get_contents($url);
if ($response) {
  $data = json_decode($response);
  if (isset($data->items[0])) {
      $item = $data->items[0];
  }
    }
?>
                <div class="carousel-item active ">
                    <div class="card">
                        <div class="img-wrapper">
                            <a class="link_card" href="livro.php?id_livro=<?=$item->volumeInfo->industryIdentifiers[0]->identifier?> ">
                                <img class="h-40" src=" <?=$thumbnail = $item->volumeInfo->imageLinks->thumbnail?>">
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                <?=$item->volumeInfo->title?> 
                            </h5>

                        </div>
                    </div>
                </div>

            <?php } 
            ?>

         
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <!--  -->

        <h4 class="text-center">Nossos autores patrocinados </h1>
        <?php 
$aut = "SELECT * FROM usuario WHERE autor = 'autor'";
$result = $conexao->query($aut);
for ($i = 0; $i < 3; $i++) {
    $autor = mysqli_fetch_array($result);
    if ($autor) { // Verifica se há um autor antes de exibir
        ?>
        <img class="profile-pic" id="iconperfil" src="<?= $autor["img_perfil"] ?>">
        <h4><?= $autor["nome_usuario"] ?></h4>
        <?php
    }
}

?>

        <hr class="divisor my-5">

        <div class="container">
            <div class="row">
                <div class="col-7">
                    <h2 class="titulo-parceiros">Conheça nossa comunidade </h2>
                    <a class="btn btn-outline-dark" href="comunidade.php" role="button">Entre <i class="bi bi-people-fill"></i></a>
                </div>
                <div class="col-5">
                    <img src="imagens/jovem-estudante-trabalhando-em-tarefa.jpg"
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                        height="500" xmlns="http://www.w3.org/2000/svg" role="img"
                        aria-label="Espaço reservado: 500 x 500" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" contain="var(--bs-secondary-bg)"></rect>
                    </svg>
                </div>
            </div>
        </div>

        <hr class="divisor my-5">

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

    <script src="style.js"></script>
</body>

</html>






<script>
var btnDelete = document.getElementById('clear');
var inputFocus = document.getElementById('inputFocus');

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="js/extesion/choices.js"></script>
<script src="js/extesion/custom-materialize.js"></script>
<script src="js/extention/flatpickr.js"></script>
<script src="js/main" .js></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="js/script.js"></script>
</body>

</html>

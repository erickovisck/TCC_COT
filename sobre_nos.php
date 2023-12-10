<?php
    session_start();

    require_once "conexao/conexao.php";




       $usuario=$_SESSION["usuario"];
$usu= "SELECT * FROM usuario WHERE email=".$usuario["email"]."";
$resultado = $conexao->query($usu);
$usuario = mysqli_fetch_array($resultado);    
     

     
       if(is_null($usuario["email"])){
           session_unset();
       session_destroy();
           header("Location: Login.php");
           exit();
       }
       //echo $nomeUsuario;
if($_SERVER["REQUEST_METHOD"]==="POST"){
$pesquisa=$_POST["pesquisa"];
$_SESSION['pesquisa']=$pesquisa;
include_once "pesquisa.php";
    }
       $conexao->close(); 
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="imagens/logo_projeto2.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/estilo.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
   
    <title>Sobre nós</title>
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
    <!--  fim menu -->
 <main class="principal">
<section class="sobre">
        <div class="extras">
            <img src="imagens/simbolo_empresa.jpg" class="imagem_redonda">
</div>
    <div class="sobre_center">
    <div class="texto_sobre">
    <h1>QUEM SOMOS? </h1>
    <p> Nossa empresa de tecnologia, denominada Creators of Thought, foi fundada com o objetivo de ajudar a solucionar um problema enfrentado por milhares de autores nacionais e por pessoas que não sabem por onde começar a ter o gosto pela leitura.
        Nosso slogan, ”Levando você ao futuro”, reflete nosso compromisso em fornecer reconhecimento, acessibilidade e facilidade  de alta qualidade sobre o problema que estamos solucionando.</p>
    <h2>O QUE É <span>COT</span>?</h2>
<p>Nosso site é dedicado a tudo que envolve livros em geral. Este site é  projetado para fornecer informações sobre autores, livros para comprar e interação entre os usuários. Nossa plataforma é fácil de usar e foi criada para atender tanto leitores quanto profissionais da área de leitura. Aqui você encontra autores, livros, chat de interação e um quiz, no qual lhe ajuda a descobrir qual gênero literário você pode mais se identificar. </p>
<p>Um site voltado para a leitura pode ser extremamente pertinente para várias  áreas, incluindo português, história, filosofia, sociologia, entre outras. Estudantes e profissionais de literatura podem se beneficiar muito desse site, pois ele fornece conhecimento do mundo da literatura nacional e internacional. Em resumo, um site voltado para essa área, pode ser altamente relevante e útil para várias áreas, fornecendo informações precisas e detalhadas sobre o mundo literário em geral. 
</p>
</div>
</div>
    </section>



</main>




<!-- Site footer -->
<footer class="site-footer mt-5 ">
<div class="container text-center" style="margin-top: 4%; color:white;">
<div class="row">
<h2 class="sobre_title" style="padding:10px;">Criadores:</h2> 
<div class="col">
     <img src="imagens/icon_camila.jpeg" class="sobre_iconp"> <br>
     <h3 class="sobre_hp">Camila Santiago</h3>
     </div>
     <div class="col">
     <img src="imagens/icon_dantas.jpeg" class="sobre_iconp">
     <h3 class="sobre_hp">Erick Dantas</h3>
     </div>
     <div class="col">
     <img src="imagens/icon_fernando.jpeg" class="sobre_iconp" >
     <h3 class="sobre_hp">Erick Fernando</h3>
     </div>
     <div class="col">
     <img src="imagens/icon_pereira.jpeg" class="sobre_iconp">
     <h3 class="sobre_hp">Guilherme Pereira</h3>
     </div>
     <div class="col">
     <img src="imagens/icon_barbosa.jpeg" class="sobre_iconp">
     <h3 class="sobre_hp">Gustavo Del Manto</h3>
     </div>
</div>
</div>
<br> <br>
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
                        <li><a href="https://mail.google.com/mail/u/0/?fs=1&tf=cm&source=mailto&to=creatorsofthought@gmail.com">Fale conosco</a></li>
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
                        <li><a class="facebook" href="https://www.facebook.com/share/NL9fR7nrcNKsgbtW/"><i class="bi bi-facebook"></i></a></li>
                        <li><a class="twitter" href="https://x.com/creababyohw?s=20"><i class="bi bi-twitter"></i></a></li>
                        <li><a class="insta" href="https://instagram.com/creatorsofthought?igshid=MzRlODBiNWFlZA"><i
                                    class="bi bi-instagram"></i></a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
</div>
</footer>



<script src="js/script.js"></script>

</body>
</html>

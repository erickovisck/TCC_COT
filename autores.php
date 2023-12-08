<?php
session_start();

require_once "conexao/conexao.php";

$api_key = 'AIzaSyAPwKI4X48Ju3lA6FJK1PHcu8nLEgcuOJ0';

/*CHAVE RESERVA 
$api_key='AIzaSyDD7Cx-7wsL0KQ1avM_vlj_x_GWTXJbiro'
$api_key='AIzaSyAPwKI4X48Ju3lA6FJK1PHcu8nLEgcuOJ0'
$api_key='AIzaSyBHe1XX1RdFudsmfRaHaAkKlzIz7wDao9k'
*/
$_SESSION["api_key"] = $api_key;
$usuario = $_SESSION["usuario"]; 
$usu= "SELECT * FROM usuario WHERE email='".$usuario["email"]."'";
$resultado = $conexao->query($usu);
$usuario = mysqli_fetch_array($resultado);
$_SESSION["usuario"]=$usuario;


if (isset($_POST["pesquisar"])) {
    $pesquisa = $_POST["pesquisar"];
    $_SESSION['pesquisar'] = $pesquisa;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/logo_projeto2.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets\css\estilo.css">

    <title>Autores</title>
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
        <?php
    if($usuario["autor"]==""){
         ?>
        <div class="container">
            <div class="card-autor row bg-secondary row-cols">
                <div class="c-left col mx-5 my-3 ">
                    <b class="fs-3 my-3 white"> Assine nosso plano aqui </b>
                    <p class="fs-5 lh-1 my-3 white">Aproveite para alavancar sua carreira de autor, com diversas oportunidades de parceria, divulgaçao, e mais!</p>

                   <!--  <button type="button" class="btn btn-primary btn-lg my-3 ">Assine Aqui</button>
                    <p class="fs-6 lh-1 my-1 white"> Após o período de teste, o Amazon Prime custará R$ 14,90/mês ou R$
                        119,00/ano, dependendo do plano escolhido. Cancele a qualquer momento.
                    </p> -->
                    <img src="imagens\logo-neutra-semFundo.png" class="img-icon d-block" alt="logo da empresa">

                </div>
                <div class="col">
                    <img src="imagens\mulher-escolhendo-livro.jpg" class="img-autor img-fluid"
                        alt="imagem de uma mulher escolhendo um livro">
                </div>
            </div>


            <?php
if($_SERVER["REQUEST_METHOD"]==="POST"){
$autor ="autor";   
$verifi="SELECT autor FROM usuario WHERE email=".$usuario["email"]."";
$response2=$conexao->query($verifi);
$data=mysqli_fetch_array($response2);
if($response2){
}else{
echo "erro".mysqli_error($conexao);
}
if($data["autor"]=="autor"){
echo"<script language='javascript' type='text/javascript'>alert('Já é autor')
;window.location.href='autores.php'</script>"; 
$verificautor=1;
}else{


$sql="UPDATE `usuario` SET `autor`='$autor' WHERE `id_usuario`='".$usuario["id_usuario"]."'";
$usuario["autor"]="autor";

$response=$conexao->query($sql);

if($response){
 echo"<script language='javascript' type='text/javascript'>alert('Bem vindo autor!')
 ;window.location.href='autores.php'</script>"; 
 $verificautor=1;
}
}
}
?>

            <div class="container text-center py-5">
                <h1>Planos</h1>
                <p class="lead">Assinaturas disponíveis</p>
            </div>

            <div class="container text-center">
                <div class="row row-cols-1 row-cols-md-3">
                    <div class="col mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h4>Leitor (padrão)</h4>
                            </div>
                            <form method="post" action="" class="card-body">
                                <h1 class="my-0 font-weight-normal">R$0.00 <small class="text-muted">/mo</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>Interagir com outros usuários</li>
                                    <li>Comprar livros </li>
                                    <li>Compartilhar seus gostos </li>
                                </ul>
                                <button type="button" class="btn btn-outline-primary btn-lg">Assinar</button>
                            </form>
                        </div>
                    </div>

                    <div class="col mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h4>Autor</h4>
                            </div>
                            <form method="post" action="" class="card-body">
                                <h1 class="my-0 font-weight-normal">R$14.99  <small class="text-muted">/mo</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>Publicar seus próprios livros</li>
                                    <li>Divulgação do autor e livro na página principal</li>
                                    
                                </ul>
                                <button type="submit" class="btn btn-outline-primary btn-lg"
                                    name="autor">Assinar</button>
                            </form>
                        </div>
                    </div>

                   
                </div>
            </div>
            <?php


                            ?>
            <?php
    }else{
?> <div class="container text-center" style="margin-top:68px; border:1px solid black; height:650px; width:900px;">
<div class="row">
<div class="col p-4" style="background-color:#2f2841; height:650px;">
<h4 class="pub-real">Realize seus sonhos!</h4>
<div class="pub-image">
   <img src="imagens/undraw_book_lover_re_rwjy.svg" >
    </div>
    <p class="pub-p">"As pessoas não compreendem como toda a vida de um homem pode ser mudada por um único livro"</p>
        <p class="pub-p">Malcom X</p>
</div>
<div class="col p-4">
<h2 class="alterar" style="margin-top:-2%">Publique  aqui os dados de seu Livro</h2>
            <form method="post" action="">
                <label class="input-box"> 
                <input type="text" name="titulo" placeholder="Titulo do Livro"> </input>
                </label>   
                <label  class="input-box">
                <input type="text" name="autor" placeholder="Nome Autor" class="publique"> </input>
                </label> 
                <labe class="input-box">
                <input type="text" name="descricao" placeholder="Descrição" class="publique2"> </input>
    </label> <br> <br>
                <label class="input-box">
                <input type="text" name="preco" placeholder="Preço do Livro" class="publique"> </input>
    </label>
                <label class="input-box">
                <input type="text" name="img" placeholder="Link Imagem(capa)" class="publique"> </input>
    </label> <br> <br>
                <input type="submit" name="enviar" class="pubotao"></input>
            </form>
            </div>
</div>
            <?php
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $titulo=$_POST["titulo"];
                $autor=$_POST["autor"];
                $descricao=$_POST["descricao"];
                $preco=$_POST["preco"];
                $img=$_POST["img"];
                $inserirlivro="INSERT INTO livros2 (titulo, autor, descricao, preco, img_livro2) VALUES ('$titulo', '$autor', '$descricao', '$preco', '$img')";
                $result=$conexao->query($inserirlivro);
                if($result){
                    echo"<script language='javascript' type='text/javascript'>alert('Livro inserido no banco')
                    ;window.location.href='inicial.php'</script>";
                    header("location:inicial.php"); 
                    exit();
                }else{
                    echo"ERRO".mysqli_error($conexao);
                }
            }
    }
    ?>
    </div>
</div>
    </main>
    <!-- rodapé -->
    <footer class="site-footer" style="margin-top:2%">
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

</body>

</html>

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

    <title>prototipo</title>
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
                    <h2><a href="perfil.php"><i class="bi bi-person-circle"></i>
                    <?= $usuario['nome_usuario'] ?></a>
                            <?= $usuario['nome_usuario'] ?>

                        </a>
                    </h2>
                    <li><a href="inicial.php">Inicial   </a></li>
                    <li><a href="https://mail.google.com/mail/u/0/?fs=1&tf=cm&source=mailto&to=creatorsofthought@gmail.com">Ajuda</a></li>
                    <li><a href="Amigos.php">Amigos</a></li>

                    </h2>
                    <li><a href="inicial.php">Inicial </a></li>
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
 <div class="container">
            <div class="card-autor row bg-secondary row-cols">
                <div class="c-left col mx-5 my-3 ">
                    <b class="fs-3 my-3 white"> Assine nosso plano aqui </b>
                    <p class="fs-5 lh-1 my-3 white">Aproveite frete GRÁTIS e rápido, filmes, séries, músicas e muito
                        mais por apenas R$ 14,90/mês ou R$ 119,00/ano, dependendo do plano escolhido.</p>

                    <button type="button" class="btn btn-primary btn-lg my-3 ">Assine Aqui</button>
                    <p class="fs-6 lh-1 my-1 white"> Após o período de teste, o Amazon Prime custará R$ 14,90/mês ou R$
                        119,00/ano, dependendo do plano escolhido. Cancele a qualquer momento.
                    </p>
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
echo "erro";
}
if($data["autor"]=="autor"){
echo"<script language='javascript' type='text/javascript'>alert('Já é autor')
;window.location.href='autores.php'</script>"; 
}else{


$sql="UPDATE `usuario` SET `autor`='$autor' WHERE `id_usuario`='".$usuario["id_usuario"]."'";
$response=$conexao->query($sql);

if($response){
 echo"<script language='javascript' type='text/javascript'>alert('Bem vindo autor!')
 ;window.location.href='autores.php'</script>"; 
}
}
}
?>

            <div class="container text-center py-5">
                <h1>Planos</h1>
                <p class="lead">compra esta merda</p>
            </div>

            <div class="container text-center">
                <div class="row row-cols-1 row-cols-md-3">
                    <div class="col mb-4">
                    <div class="card shadow-sm">
                            <div class="card-header">
                                <h4>Grátis</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="my-0 font-weight-normal">R$0 <small class="text-muted">/mo</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>Lorem ipsum dolor sit</li>
                                    <li>Lorem dolor sit</li>
                                    <li>Lorem ipsum dolor </li>
                                    <li>Lorem ipsum sit</li>
                                </ul>
                                <button type="button" class="btn btn-outline-primary btn-lg">Primary</button>
                            </div>
                    </div>
                    </div>

                    <div class="col mb-4">
                    <div class="card shadow-sm">
                            <div class="card-header">
                                <h4>Grátis</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="my-0 font-weight-normal">R$0 <small class="text-muted">/mo</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>Lorem ipsum dolor sit</li>
                                    <li>Lorem dolor sit</li>
                                    <li>Lorem ipsum dolor </li>
                                    <li>Lorem ipsum sit</li>
                                </ul>
                                <button type="button" class="btn btn-outline-primary btn-lg">Primary</button>
                            </div>
                    </div>
                    </div>

                    <div class="col mb-4">
                    <div class="card shadow-sm">
                            <div class="card-header">
                                <h4>Grátis</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="my-0 font-weight-normal">R$0 <small class="text-muted">/mo</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>Lorem ipsum dolor sit</li>
                                    <li>Lorem dolor sit</li>
                                    <li>Lorem ipsum dolor </li>
                                    <li>Lorem ipsum sit</li>
                                </ul>
                                <button type="button" class="btn btn-outline-primary btn-lg">Primary</button>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
                            <?php


                            if (isset($_POST['autor'])) {
                                $sql = "UPDATE `usuario` SET `autor`='$autor' WHERE `id_usuario`='" . $usuario["id_usuario"] . "'";
                                $response = $conexao->query($sql);
                                $autor = $_POST['autor'];

                                if ($response) {
                                    echo "<script language='javascript' type='text/javascript'>alert('Bem vindo autor!')
        ;window.location.href='Login.php'</script>";
                                    header("Location: autores.php");
                                    exit();
                                }
                            }
                            ?>
    </main>


</body>

</html>

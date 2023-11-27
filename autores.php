<?php
session_start();

require_once "conexao/conexao.php";

$api_key='AIzaSyAPwKI4X48Ju3lA6FJK1PHcu8nLEgcuOJ0';

/*CHAVE RESERVA 
$api_key='AIzaSyDD7Cx-7wsL0KQ1avM_vlj_x_GWTXJbiro'
$api_key='AIzaSyAPwKI4X48Ju3lA6FJK1PHcu8nLEgcuOJ0'
$api_key='AIzaSyBHe1XX1RdFudsmfRaHaAkKlzIz7wDao9k'
*/
$_SESSION["api_key"]=$api_key;

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
    <link rel="stylesheet" href="assets\css\estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
                    <?= $usuario['nome_usuario'] ?></a>
                        
                    </h2>
                    <li><a href="inicial.php">Inicial   </a></li>
                    <li><a href="https://mail.google.com/mail/u/0/?fs=1&tf=cm&source=mailto&to=creatorsofthought@gmail.com">Ajuda</a></li>
                    <li><a href="Amigos.php">Amigos</a></li>

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

<div class="container p-5">
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
    <div class="col">
    <div class="card border-secondary mb-3" style="max-width: 18rem;">
  <div class="card-header">Grátis</div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Secondary card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <button type="button" class="btn btn-secondary">Secondary</button>
  </div>
</div>
    </div>
    <div class="col">
    <div class="card border-secondary mb-3" style="max-width: 18rem;">
  <div class="card-header">Autor</div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Secondary card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <form action="" method="post">autor
 

        <input type="submit" name="enviar" value="autor">
<!--     <button type="button" class="btn btn-secondary">Inscrever</button>
 --></input>
</form>
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
    echo"<script language='javascript' type='text/javascript'>alert('Ja e autor')
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
  </div>
</div>
    </div>
    <div class="col">
    <div class="card border-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">Empresa</div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Secondary card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <button type="button" class="btn btn-secondary">Secondary</button>
  </div>
</div>
</div>
    </div>


    </div>
</div>


</main>
</body>
</html>

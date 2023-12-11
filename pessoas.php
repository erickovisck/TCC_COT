<?php
session_start();

require_once "conexao/conexao.php";

$usuario=$_SESSION["usuario"];
$usu= "SELECT * FROM usuario WHERE email='".$usuario["email"]."'";
$resultado = $conexao->query($usu);
$usuario = mysqli_fetch_array($resultado);$pesquisarp = $_POST["pesquisarpessoa"];

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
    <link rel="stylesheet" href="assets/css/comunidade.css">
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
<!-- FIM MENU -->



            <main class="principal bg-body-tertiary">
            <div class="container my-5">

                <?php
              if ($pesquisarp) {
                
    $sql = "SELECT * FROM usuario WHERE nome_usuario = '$pesquisarp'";
    $resultado = $conexao->query($sql);
    
    if ($dados = mysqli_fetch_array($resultado)) {
        echo "<h2 class='text-center'>Usuários encontrados: </h2>";
    
        // Use a while loop to iterate through each row of the result
        do{
            ?>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="perfil_pessoa.php?id_usuario=<?= $dados["id_usuario"] ?>">
                        <img class="profile-pic" id="iconperfil" src="<?= $dados["img_perfil"] ?>">
                        <?= $dados["nome_usuario"] ?>
                    </a>
                </li>
            </ul>
            <?php
        }while( ($dados = mysqli_fetch_array($resultado)) );    
    } else {
        // If no rows were found
        echo "<h2 class='text-center'> Leitor não encontrado :( </h2>";
    }
}

                ?>
                </div>
            </main>
           
           </body>
           
           </html>
           

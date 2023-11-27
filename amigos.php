
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
                    <h2><i class="bi bi-person-circle"></i>:
                        <?= $usuario['nome_usuario'] ?>
                    </h2>
                    <li><a href="inicial">Inicial</a></li>
                    <li><a href="perfil.php">Perfil</a></li>
                    <li><a href="https://mail.google.com/mail/u/0/?fs=1&tf=cm&source=mailto&to=creatorsofthought@gmail.com">Ajuda</a></li>
                    
                    <li><a href="amigos.php">amigos</a></li>
                    <li><a href="autores.php">Autores</a></li>
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
<?php
$sql = "SELECT * FROM seguir WHERE id_seguidor=" . $usuario["id_usuario"];
$result = $conexao->query($sql);
$data = mysqli_fetch_array($result);

$sql2 = "SELECT * FROM seguir WHERE id_seguidor=" . $usuario["id_usuario"] . " AND id_seguido=" . $data["id_seguido"];
$result2 = $conexao->query($sql2);
$data2 = mysqli_fetch_array($result2);

while ($data2 = mysqli_fetch_array($result2)) {
    $sql3 = "SELECT * FROM usuario WHERE id_usuario = " . $data2["id_seguido"];
    $resultado3 = $conexao->query($sql3);
    $dados4 = mysqli_fetch_array($resultado3);

    ?><a href="perfil_pessoa.php?id_usuario=<?=$dados4["id_usuario"]?>"> <img class="profile-pic" id="iconperfil" src="<?=$dados4["img_perfil"]?>"><?php echo $dados4["nome_usuario"]; ?></a> <br> <?php
}

?>

        </main>
           
           </body>
           
           </html>
           

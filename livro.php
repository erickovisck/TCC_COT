<?php
session_start();
//GOOGLE API//
$api_key = 'AIzaSyBHe1XX1RdFudsmfRaHaAkKlzIz7wDao9k';
$idlivro=$_GET['id_livro']; 

$url = "https://www.googleapis.com/books/v1/volumes?q=isbn:" . urlencode($idlivro) ."&key=" . $api_key;
$response = file_get_contents($url);
$data = json_decode($response);


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
                    <li><a href="inicial.php">Inicial</a></li>
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
        <div class="livro">
            <?php
if ($response) {
    $data = json_decode($response);
    
    if (isset($data->items[0])) {
        $item = $data->items[0];

        ?>
        <div class="sla">
            <div class="imglivro">
                <?php
                if(isset($item->volumeInfo->imageLinks->thumbnail)){
                    echo "<img src='". $thumbnail = $item->volumeInfo->imageLinks->thumbnail."'>";
                }else{
                    echo "Imagem não disponível";
                }
                if(isset($item->volumeInfo->averageRating)){
                    echo "Nota média ".$item->volumeInfo->averageRating."★<br>";
                }else{
                    echo "Nota não disponivel";
                }
                if(isset($item->volumeInfo->saleInfo->listPrice->amount)){
                    echo "Preço".$item->volumeInfo->saleInfo->listPrice->amount;
                }else{
                    echo "Preço  não disponivel";
                }

/*  echo "Preço R$".$item->volumeInfo->saleInfo->saleability;
 */?>
</div>
            </div>
<div class="dadoslivro">
            <?php
       echo "<h1>" . $title = $item->volumeInfo->title."</h1>";
        echo "<h2>".$authors = implode(", ", $item->volumeInfo->authors)."</h2>";
       echo $item->volumeInfo->description;
    }
}


?>
</div>
        </div>
    </main>
</body>

</html>

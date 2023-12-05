<?php
session_start();
//GOOGLE API//
$api_key=$_SESSION["api_key"];
require_once "conexao/conexao.php";
$id_livro = isset($_GET['id_livro']) ? $_GET['id_livro'] : null;
$id_livro2 = isset($_GET['id_livro2']) ? $_GET['id_livro2'] : null;

if($id_livro){
$url = "https://www.googleapis.com/books/v1/volumes?q=isbn:" . urlencode($id_livro) ."&key=" . $api_key;
$response = file_get_contents($url);
$data = json_decode($response);
$response2=null;
}else{
    $id_livro2=$_GET['id_livro2'];
    $url2="SELECT * FROM livros2 WHERE id_livro2=$id_livro2";
    $response2=$conexao->query($url2);
    $livro2=mysqli_fetch_array($response2);
    $response=null;

}






$usuario=$_SESSION["usuario"];
$usu= "SELECT * FROM usuario WHERE email=".$usuario["email"]."";
$resultado = $conexao->query($usu);
$usuario = mysqli_fetch_array($resultado);


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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">

    <title>Livro</title>
    <link rel="shortcut icon" href="imagens/logo_projeto2.png">
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


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

        <div class="container-xxl p-4">

            <div class="row align-items-center  bg-body border border-black">
                <?php
if ($response) {
    $data = json_decode($response);
    
    if (isset($data->items[0])) {
        $item = $data->items[0];

        ?>
                <div class="sla col-md-auto p-5 text-center">
                    <div class="imglivro ">
                        <?php
                if(isset($item->volumeInfo->imageLinks->thumbnail)){
                    echo "<img src='". $thumbnail = $item->volumeInfo->imageLinks->thumbnail."'>";
                }else{
                    echo "Imagem não disponível";
                }
                if(isset($item->volumeInfo->averageRating)){
                    echo "Nota média ".$item->volumeInfo->averageRating."★<br>";
                }else{
                    echo "Nota não disponivel <br>";
                }
                 $preco="SELECT preco FROM livros WHERE isbn=".$item->volumeInfo->industryIdentifiers[0]->identifier."";
              $resulpreco=$conexao->query($preco);
                    $dadopreco=mysqli_fetch_array($resulpreco);
                    echo "R$".$dadopreco["preco"];
               

/*  echo "Preço R$".$item->volumeInfo->saleInfo->saleability;
 */?>
                    </div>
                </div>
                <div class="dadoslivro col py-5 align-self-end">
                    <?php
       echo "<h1>" . $title = $item->volumeInfo->title."</h1>";
        echo "<h2>".$authors = implode(", ", $item->volumeInfo->authors)."</h2>";
       echo $item->volumeInfo->description;
       $id_livro=$item->volumeInfo->industryIdentifiers[0]->identifier;
      $item2= $item->volumeInfo->title;
    
}
}elseif($livro2){
?>
  <div class="sla col-md-auto p-5 text-center">
                    <div class="imglivro ">
                        <?php
                    echo "<img src='". $livro2["img_livro2"]."'>";
               
            
                    echo "R$".$livro2["preco"];
               

/*  echo "Preço R$".$item->volumeInfo->saleInfo->saleability;
 */?>
                    </div>
                </div>
                <div class="dadoslivro col py-5 align-self-end">
                    <?php
       echo "<h1>" . $livro2["titulo"]."</h1>";
        echo "<h2>".$livro2["autor"]."</h2>";
       echo $livro2["descricao"];
      

}


?>
                </div>
            </div>

        <div class="row my-3"> 
            <div class="col d-flex">
        <form action="" method="post">
    <input class="btn btn-primary" type="submit" name="comprar" value="comprar">
</form>

<?php
if (isset($_POST["comprar"])) {
    $ver = "SELECT id_livro FROM carrinho WHERE id_usuario = " . $usuario["id_usuario"];
    $resul = $conexao->query($ver);

  
       
      if($id_livro2==null){
            $sql = "INSERT INTO carrinho (id_livro, id_usuario, quantidade,livro2)
            SELECT '$id_livro', '".$usuario["id_usuario"]."', 1, 0
            WHERE NOT EXISTS (
                SELECT 1
                FROM carrinho
                WHERE id_livro = '$id_livro' AND id_usuario = '".$usuario["id_usuario"]."'
            )";

            if ($conexao->query($sql) === true) {
                // Inserção bem-sucedida
                echo "Livro adicionado no carrinho com sucesso";
            
        }else{
            echo "livro ja exite";
        }
    }elseif($id_livro==null){
        $sql = "INSERT INTO carrinho (id_livro, id_usuario, quantidade,livro2)
        SELECT '$id_livro', '".$usuario["id_usuario"]."', 1, 1
        WHERE NOT EXISTS (
            SELECT 1
            FROM carrinho
            WHERE id_livro = '$id_livro' AND id_usuario = '".$usuario["id_usuario"]."'
        )";

        if ($conexao->query($sql) === true) {
            // Inserção bem-sucedida
            echo "Livro adicionado no carrinho com sucesso";
        
    }else{
        echo "livro ja exite";
    }
    }
    }


?>

<a href="carrinho.php"> <i class="bi bi-cart2 mx-2"></i></a>
             </form>
             </div>
             </div>
             </div>
    </main>
</body>

</html>

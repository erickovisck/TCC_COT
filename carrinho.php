<?php
require_once "conexao/conexao.php";
session_start();
function limitarCaracteres($texto, $limite) {
    // Verifica se o texto é maior que o limite
    if (strlen($texto) > $limite) {
        // Corta o texto no limite e adiciona "..." ao final
        $texto = substr($texto, 0, $limite) . "...";
    }
    return $texto;
}
$api_key=$_SESSION["api_key"];
$precototal=0;
$usuario = $_SESSION['usuario'];

$sql = "SELECT id_livro FROM carrinho WHERE id_usuario=" . $usuario['id_usuario'];
$resultado = $conexao->query($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="shortcut icon" href="imagens/logo_empresa.jpg">
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
                    <h2>Usuário: <?= $usuario['nome_usuario']?> </h2>
                    <li><a href="inicial">Inicial</a></li>
                    <li><a href="perfil.php">Perfil</a></li>
                    <li><a href="ajuda.php">Ajuda</a></li>
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
    <script src="script.js"></script>
    <main class="principal bg-body-secondary">
        <div class="container">

    <h1 id="meucarrinho">Meu carrinho</h1>
    <div class="imagem_carrinho">
    <i class="bi bi-bag-check"></i> 
   </div> 
    <div class="estante container text-center">

    <?php 
   while ($query = mysqli_fetch_array($resultado)) {
    $isbn = $query['id_livro'];
    $url = "https://www.googleapis.com/books/v1/volumes?q=isbn:" . $isbn . "&key=" . $api_key;
    $response = file_get_contents($url);

    $data = json_decode($response);

    if ($data && isset($data->items)) {
        ?>
            <?php
        foreach ($data->items as $item) {

      
            ?>
                                        <div class="livros bg-body p-3 border border-black">
        <?php
                                      echo "<a href='livro.php?id_livro=" . $item->volumeInfo->industryIdentifiers[0]->identifier. "'>";
                                      if (isset($item->volumeInfo->imageLinks)) {
                  echo "<img src='" . $item->volumeInfo->imageLinks->thumbnail . "'>";
              } else {
                  // Lide com o caso em que a imagem não está disponível
                  echo "Imagem não disponível";
              }
             $texto= $item->volumeInfo->title;
             $limite = 33;
              $titulo=limitarCaracteres($texto,$limite);
    
                          echo "<h1>". $titulo. "</h1>";  
           echo "</a>"; 
              echo "<h2>";    
              if (isset($item->volumeInfo->authors)) {
              echo  implode("",$item->volumeInfo->authors) . "<br>";  
              }else{
                  echo "Autor não disponivel<br>";
              }
              $preco="SELECT preco FROM livros WHERE isbn=".$item->volumeInfo->industryIdentifiers[0]->identifier."";
              $resulpreco=$conexao->query($preco);
                    $dadopreco=mysqli_fetch_array($resulpreco);
                    echo "R$".$dadopreco["preco"];
             $precototal=$precototal+$dadopreco["preco"];
                          echo "</h2>";
              echo "<form method='post' action='carrinho.php'>"; // O formulário envia dados para a página "carrinho.php"
              echo "</div>";
                  } 
             
                  
            } 
    }


// Certifique-se de fechar a conexão com o banco de dados após o uso



    
    // Redirecionar para esta página usando GET após a inserção bem-sucedida


 
    

    ?>
</div>

        <form method="post" action="">
            <div class="carrinhos">
                <h2> Valor total: R$<?=$precototal?></h2>
            </div> <br>
            <input type="submit" name="comprarcarrinho" id="btncomprar" class="text-end" value="Comprar"> </input>
            
            <div class="carrinhos">
                <h3></h3>
            </div>
        </form> <br> <br>
        <?php 
        if(isset($_POST["comprarcarrinho"])){
            $del="DELETE FROM carrinho WHERE id_usuario=".$usuario["id_usuario"]."";
            $delres=$conexao->query($del);
        }
        ?>
        <div class="voltarpagina">
            <form method="" action="inicial.php">
                <input type="submit" id="voltainc" value="VOLTAR AO INÍCIO">
        </div>
        </form>
        </div>
        </main>
</body>

</html>

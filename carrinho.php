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
$usu= "SELECT * FROM usuario WHERE email='".$usuario["email"]."'";
$resultado = $conexao->query($usu);
$usuario = mysqli_fetch_array($resultado);
$_SESSION["usuario"]=$usuario;
$sql = "SELECT * FROM carrinho WHERE id_usuario='". $usuario['id_usuario']."'";
$resultado = $conexao->query($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="shortcut icon" href="imagens/logo_projeto2.png">
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
    <script src="script.js"></script>
    <main class="principal bg-body-secondary">
        <div class="container">

    <h1 id="meucarrinho">Meu carrinho</h1>
    <div class="imagem_carrinho">
    <i class="bi bi-bag-check"></i> 
   </div> 
    <div class="estante container text-center row">

    <?php 
   while ($query = mysqli_fetch_array($resultado)) {
       if($query["livro2"]==0){
    $isbn = $query['id_livro'];
    $url = "https://www.googleapis.com/books/v1/volumes?q=isbn:" . $isbn . "&key=" . $api_key;
    $response = file_get_contents($url);

    $data = json_decode($response);

    if ($data && isset($data->items)) {
        ?>
            <?php
    foreach ($data->items as $item) {
        ?>
        <div class="livros row-sm-6  bg-body p-3 border border-blac">
            <?php
            echo "<a href='livro.php?id_livro=" . $item->volumeInfo->industryIdentifiers[0]->identifier . "'>";
            if (isset($item->volumeInfo->imageLinks)) {
                echo "<img src='" . $item->volumeInfo->imageLinks->thumbnail . "'>";
            } else {
                // Lide com o caso em que a imagem não está disponível
                echo "Imagem não disponível";
            }
            $texto = $item->volumeInfo->title;
            $limite = 33;
            $titulo = limitarCaracteres($texto, $limite);
    
            echo "<h1>" . $titulo . "</h1>";
            echo "</a>";
            echo "<h2>";
            if (isset($item->volumeInfo->authors)) {
                echo  implode("", $item->volumeInfo->authors) . "<br>";
            } else {
                echo "Autor não disponível<br>";
            }
            $preco = "SELECT preco FROM livros WHERE isbn=" . $item->volumeInfo->industryIdentifiers[0]->identifier . "";
            $resulpreco = $conexao->query($preco);
            $dadopreco = mysqli_fetch_array($resulpreco);
            echo "R$" . $dadopreco["preco"];
            $precototal = $precototal + $dadopreco["preco"];
            echo "</h2>";
            echo "<form method='post' action='carrinho.php'>";
            echo "<input type='hidden' name='isbn' value='" . $item->volumeInfo->industryIdentifiers[0]->identifier . "'>";
            echo "<button type='submit' name='remover_do_carrinho_" . $item->volumeInfo->industryIdentifiers[0]->identifier . "'>Remover do Carrinho</button>";
            echo "</form>";
            
            if (isset($_POST["remover_do_carrinho_" . $item->volumeInfo->industryIdentifiers[0]->identifier])) {
                $del2 = "DELETE FROM carrinho WHERE id_livro=" . $item->volumeInfo->industryIdentifiers[0]->identifier . "";
                $delres2 = $conexao->query($del2);
            
                echo "<script language='javascript' type='text/javascript'>alert('Livro removido');window.location.href='carrinho.php'</script>";
                exit();
            }
            
            echo "</form>";
           
            echo "</div>";
        }
    }
    
    
    }else{
       
$sql="SELECT * FROM livros2 WHERE id_livro2 =".$query["id_livro"]."";
$result2=$conexao->query($sql);

$livro2=mysqli_fetch_array($result2);
      
            ?>
                                        <div class="livros row-sm-6  bg-body p-3 border border-blac ">
        <?php
                                      echo "<a href='livro.php?id_livro2=" . $livro2["id_livro2"]. "'>";
                                      if (isset($livro2["img_livro2"])) {
                  echo "<img src='" . $livro2["img_livro2"]. "'>";
              } else {
                  // Lide com o caso em que a imagem não está disponível
                  echo "Imagem não disponível";
              }
             $texto= $livro2["titulo"];
             $limite = 33;
              $titulo=limitarCaracteres($texto,$limite);
    
                          echo "<h1>". $titulo. "</h1>";  
           echo "</a>"; 
              echo "<h2>";    
              if (isset($livro2["autor"])) {
              echo  $livro2["autor"]. "<br>";  
              }else{
                  echo "Autor não disponivel<br>";
              }
              
              
                    echo "R$".$livro2["preco"];
             $precototal=$precototal+$livro2["preco"];
                          echo "</h2>";
                          echo "<form method='post' action='carrinho.php'>";
                          echo "<input type='hidden' name='isbn' value='" . $item->volumeInfo->industryIdentifiers[0]->identifier . "'>";
                          echo "<button type='submit' name='remover_do_carrinho_" . $item->volumeInfo->industryIdentifiers[0]->identifier . "'>Remover do Carrinho</button>";
                          echo "</form>";
                          
                          if (isset($_POST["remover_do_carrinho_" . $livro2["id_livro2"]])) {
                              $del2 = "DELETE FROM carrinho WHERE id_livro=" . $livro2["id_livro2"] . "";
                              $delres2 = $conexao->query($del2);
                          
                              echo "<script language='javascript' type='text/javascript'>alert('Livro removido');window.location.href='carrinho.php'</script>";
                              exit();
                          }
              echo "</div>";
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
            <input type="submit" name="comprarcarrinho" class="btn btn-primary" id="btncomprar" class="text-end" value="Comprar"> </input>
            
            <div class="carrinhos">
                <h3></h3>
            </div>
        </form> <br> <br>
        <?php 
        if(isset($_POST["comprarcarrinho"])){
            $del="DELETE FROM carrinho WHERE id_usuario=".$usuario["id_usuario"]."";
            $delres=$conexao->query($del);
           echo"<script language='javascript' type='text/javascript'>alert('Compra realizada com sucesso!')
           ;window.location.href='carrinho.php'</script>";
            exit();
        

        }
       
        ?>
        <div class="voltarpagina">
            <form method="" action="inicial.php">
                <input type="submit" class="btn" id="voltainc" value="VOLTAR AO INÍCIO">
        </div>
        </form>
        </div>
        </main>
</body>

</html>

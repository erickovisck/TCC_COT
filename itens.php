<?php
session_start();
require_once "conexao/conexao.php";
if(isset($_POST["pesquisar"])){
$pesquisa = $_POST["pesquisar"];
$query =$pesquisa;

}
function limitarCaracteres($texto, $limite) {
    // Verifica se o texto é maior que o limite
    if (strlen($texto) > $limite) {
        // Corta o texto no limite e adiciona "..." ao final
        $texto = substr($texto, 0, $limite) . "...";
    }
    return $texto;
}

//GOOGLE API//


$api_key=$_SESSION["api_key"];
$max=1;


//------//
//API PREÇO//
$minn=30.00;
$maxx=70.00;
//----------//
$usuario=$_SESSION["usuario"];


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["comprar"])) {
    $id_livro = $_POST["id_livro"];
    $quantidade = $_POST["quantidade"];
    
    // Verifica se o carrinho já existe na sessão
    if (!isset($_SESSION["carrinho"])) {
        $_SESSION["carrinho"] = [];
    }
    
 

}

// Conectar ao banco de dados (já mostrado no código anterior)

$sql = "SELECT * FROM livros";
$resultado = $conexao->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/logo_projeto2.png">
    <title>Itens</title>
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
    <main class="principal bg-body-secondary">


        <!--  <div class="div-master">
  <div class="before"><div class="arrow-left"></div></div>
  <div class="middle">
    <h4 class="title">Popular Movies</h4>
    <div class="carrossel" id="mylist">
      <div class="item-c">
        <img src="https://i.kinja-img.com/gawker-media/image/upload/s--MuEBzPKk--/c_scale,fl_progressive,q_80,w_800/blhf0f9hujxfki62hhsp.jpg">
        <div class="caption">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        </div>
      </div> 
    </div>
  </div>
    <div class="after"><div class="arrow-right"></div></div>
</div>

<div class="div-master">
  <h4 class="title">Popular Movies</h4>
  
  <div class="carrossel" id="mylist2">
    
  </div>
  
</div>
 -->



        <?php
if(isset($_POST["pesquisar"])==false){
                    

    $categoria=[
        "romance",
        "fiction",
        "action",
        "terror",
        "horror"];
        $cat="";
foreach ($categoria as $cat){
        $url = "https://www.googleapis.com/books/v1/volumes?q=subject:$cat&startIndex=0&maxResults=8&key=" . $api_key;
        $response = file_get_contents($url);
        $data = json_decode($response);
        ?><div class="categoria"> <h1 class="categoria text-center"> <?=$cat?> </h1> </div><?php
        ?> <div class="estante container text-center"><?php


        foreach ($data->items as $item) {
          

          $livrosateaq=[$item->volumeInfo->title];
          if($livrosateaq!= $item->volumeInfo->title ){
            ?>
            <div class="livros bg-body p-3 border border-black">
                <?php
                                      echo "<a href='livro.php?id_livro=" . $item->volumeInfo->industryIdentifiers[0]->identifier. "'>";
/*                                       echo implode("",$item->volumeInfo->categories);
 */                                      if (isset($item->volumeInfo->imageLinks)) {
                  echo "<img src='" . $item->volumeInfo->imageLinks->thumbnail . "'>";
              } else {
                  // Lide com o caso em que a imagem não está disponível
                  echo "<img src='imagens/Red_Prohibited_sign_No_icon_warning_or_stop_symbol_safety_danger_isolated_vector_illustration.jpg'>";    
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
              
              if ($resulpreco && $resulpreco->num_rows > 0) {
                  $dadopreco=mysqli_fetch_array($resulpreco);
                  echo "Preço: R$".$dadopreco["preco"];
                 
              } else {
                  // Lide com o caso em que o preço não está disponível
                  
                  $preco2=rand($minn,$maxx);
                  $preco2=$preco2+0.99;

                  echo "Preço: R$ " . $preco2;
                  $novpreco="INSERT INTO livros (isbn, preco) VALUES ('".$item->volumeInfo->industryIdentifiers[0]->identifier."', '$preco2')";
                $resul2=$conexao->query($novpreco);
                echo "erro".mysqli_error($conexao);

                     }
                          echo "</h2>";
              echo "<form method='post' action='carrinho.php'>"; // O formulário envia dados para a página "carrinho.php"
            
              echo "</div>";   

                  
                
        
    }
    
}

echo "</div>";  }
                    } else {?>

                        <div class="estante container text-center">
<?php
                        $sql2="SELECT * FROM livros2";
                        $resultado2 = $conexao->query($sql2);
                        if($resultado2){
                         
                           while($livro2=mysqli_fetch_array($resultado2)){
                            if($livro2["titulo"]=="$pesquisa"){
                               ?>
                            <div class="livros bg-body p-3 border border-black">
                            <?php
                                                              echo "<a href='livro.php?id_livro2=" . $livro2["id_livro2"]. "'>";
                        /*                                       echo implode("",$item->volumeInfo->categories);
                         */                                      if (isset($livro2["img_livro2"])) {
                                          echo "<img src='" . $livro2["img_livro2"]. "'>";
                                      } else {
                                          // Lide com o caso em que a imagem não está disponível
                                          echo "<img src='imagens/Red_Prohibited_sign_No_icon_warning_or_stop_symbol_safety_danger_isolated_vector_illustration.jpg'>";                                   }
                                     $texto= $livro2["titulo"];
                                     $limite = 33;
                                      $titulo=limitarCaracteres($texto,$limite);
    
                                                  echo "<h1>". $titulo. "</h1>";  
                                   echo "</a>"; 
                                      echo "<h2>";    
                                      if (isset($livro2["autor"])) {
                                      echo  $livro2["autor"] ."<br>";  
                                      }else{
                                          echo "Autor não disponivel<br>";
                                      }
                                     
                      echo "Preço: R$".$livro2["preco"];
            
                      // Lide com o caso em que o preço não está disponível
                    
                  
    
                         
                                                  echo "</h2>";
                                      echo "<form method='post' action='carrinho.php'>"; // O formulário envia dados para a página "carrinho.php"
                                      echo "</div>";
                                           
                                     
                                          
                                      
                                }
                            }
                            }else{
                                echo"erro".mysqli_error($conexao);
                            }

                        
                      
                        $min=0;
                       
                 

                    
       ?>
                    <?php
                        do {
                             error_reporting(0);
                            ini_set('display_errors', 0); 
        
                            $url = "https://www.googleapis.com/books/v1/volumes?q=intitle:" . urlencode($query) . "&startIndex=$min&maxResults=$max&key=" . $api_key;
                            $response= file_get_contents($url);

  
                            $data = json_decode($response);
                            if ($data === null || !property_exists($data, 'items')) {
                                break;  // Saia do loop do-while se não houver mais resultados
                            }
                            foreach ($data->items as $item) {
                             
                              if($item->volumeInfo->title ){
                                ?>
                    <div class="livros bg-body p-3 border border-black">
                        <?php
                                                          echo "<a href='livro.php?id_livro=" . $item->volumeInfo->industryIdentifiers[0]->identifier. "'>";
                    /*                                       echo implode("",$item->volumeInfo->categories);
                     */                                      if (isset($item->volumeInfo->imageLinks)) {
                                      echo "<img src='" . $item->volumeInfo->imageLinks->smallThumbnail . "'>";
                                  } else {
                                      // Lide com o caso em que a imagem não está disponível
                                      echo "<img src='imagens/Red_Prohibited_sign_No_icon_warning_or_stop_symbol_safety_danger_isolated_vector_illustration.jpg'>";                                   }
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
              
              if ($resulpreco && $resulpreco->num_rows > 0) {
                  $dadopreco=mysqli_fetch_array($resulpreco);
                  echo "Preço: R$".$dadopreco["preco"];
                 
              } else {
                  // Lide com o caso em que o preço não está disponível
                  $preco2=rand($minn,$maxx);
                  $preco2=$preco2+0.99;
                  echo "Preço: R$ " . $preco2;
                  $novpreco="INSERT INTO livros (isbn, preco) VALUES ('".$item->volumeInfo->industryIdentifiers[0]->identifier."', '$preco2')";
                $resul2=$conexao->query($novpreco);

                     }
                                              echo "</h2>";
                                  echo "<form method='post' action='carrinho.php'>"; // O formulário envia dados para a página "carrinho.php"
                                  echo "</div>";
                                       
                                 
                                      
                                    $max ++;
                                    $min++;
                            }
                        }
                                } while (isset($data->items) && count($data->items) > 0);
                       
                                    }
                                
                                    
                           
     
?>
                    </div>
                </div>
                <?php
        // ...


               
            
            ?>
    </main>
    <footer class="site-footer">
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
                        <li><a href="sobre_nos.php">Sobre nos</a></li>
                        <li><a href="https://mail.google.com/mail/u/0/?fs=1&tf=cm&source=mailto&to=creatorsofthought@gmail.com">Fale conosco</a></li>
                        <li><a href="politica.html">Poliítica de Privacidade</a></li>
                        
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
    </footer>
    <?php


                $conexao->close(); 
                ?>
    <script src="script.js"></script>
</body>

</html>

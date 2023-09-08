<?php
    session_start();

    require_once "conexao/conexao.php";

       $usuario = $_SESSION["usuario"];
    
       echo $usuario["nome_usuario"]; 

     
       if(is_null($usuario["email"])){
           session_unset();
       session_destroy();
           header("Location: index.php");
           exit();
       }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/estilo.css">

</head>

<body>
    <header class="cabecalho">
        <div class="btnMenu">
            <button id="toggleButton">Abrir Menu</button>
        </div>
        <div class="pesquisa"> 
            <form action="" method="post">
<input type="text" name="pesquisa">
<input type="submit" value="pesquisar">

</form>
<a href="carrinho.php"> carrinho</a>
        </div>
        <div class="cabecalhoMenu">
                <div class="headerMenu">
                    <div class="closeMenu">
                        <button id="toggleButton2">Fechar Menu</button>
                    </div>
                    <div class="headerMenuTitle">
                        <h2>
                            <img src="">
                            Olá
                        </h2>
                    </div>
                </div>
                <div class="contentMenu">
                    <ul> 
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
            <input type="text" name="pesquisa" id="pesquisa">
            <img url="imagens/teste.png">
        </div>
    </header>
    <main class="principal">
        <h2> <?=$mens?></h2>
        <?php
 
   $sql = "SELECT * FROM livros";
   $resultado = $conexao->query($sql);
   
   if($_SERVER["REQUEST_METHOD"]==="POST"){
    $pesquisa=$_POST["pesquisa"];
    
    $_SESSION['pesquisa']=$pesquisa;
    include_once "pesquisa.php";
    
   }else{
   if ($resultado) {
       while ($dados = mysqli_fetch_array($resultado)) {
           $mens= "Nome do livro: " . $dados["nome_livro"] . "<br>".
           "Autor: " . $dados["nome_autor"] . "<br>".
           "Preço: R$" . $dados["preco"] . "<br><br>";
echo $mens;
       }
   
       // Feche o resultado após o uso
       mysqli_free_result($resultado);
   } else {
       // Lida com erros de consulta, se houverem
       echo "Erro na consulta: " . mysqli_error($conexao);
   }
   }
   ?>
    </main>
    <?php


       $conexao->close(); 
    ?>
    <script src="script.js"></script>
</body>

</html>
